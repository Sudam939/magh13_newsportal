<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // return $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'phone' => 'required|unique:admins|digits:10',
            'email' => 'required|unique:admins', //sudamshrestha@gmail.com//sudamshrestha@gmail.com
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ]);
        }

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        $token = $admin->createToken('admin_token')->plainTextToken;

        return response()->json([
            "success" => true,
            "admin" => $admin,
            "token" => $token,
            "message" => "Admin registered successfully"
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ]);
        }

        $admin = Admin::where('email', $request->username)->orWhere('phone', $request->username)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json([
                "success" => false,
                "admin" => null,
                "message" => "useremail or password is incorrect."
            ]);
        }

        $token = $admin->createToken('admin_token')->plainTextToken;

        session()->put('token', $token);

        $cookie_data = session('token');
        return response()->json([
            "success" => true,
            "cookie_data" => $cookie_data,
            "admin" => $admin,
            "token" => $token,
            "message" => "Admin LoggedIn successfully"
        ]);
    }
}
