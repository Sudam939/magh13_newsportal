<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // go to index view admin.company.index
        $company = Company::first();
        return view("admin.company.index", compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // go to create view admin.company.create
        return view("admin.company.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // save data
        $request->validate([
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required",
            "logo" => "required|max:2048",
        ]);

        $file = $request->logo;
        if ($file) {
            $newName = time() . "." . $file->getClientOriginalExtension();
            $file->move('images', $newName);
        }

        Company::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "facebook" => $request->facebook,
            "youtube" => $request->youtube,
            "logo" => "images/" . $newName
        ]);

        return redirect()->route("admin.company.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // go to edit view
        $company = Company::find($id);
        return view("admin.company.edit", compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update data
        $request->validate([
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required",
        ]);

        $company = Company::find($id);
        $file = $request->logo;
        if ($file) {
            $newName = time() . "." . $file->getClientOriginalExtension();
            $file->move('images', $newName);
            unlink($company->logo);
        }

        if ($file) {
            $company->update([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "address" => $request->address,
                "facebook" => $request->facebook,
                "youtube" => $request->youtube,
                "logo" => "images/" . $newName
            ]);
        } else {
            $company->update([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "address" => $request->address,
                "facebook" => $request->facebook,
                "youtube" => $request->youtube
            ]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete data
        $company = Company::find($id);
        unlink($company->logo);
        $company->delete();
        return redirect()->back();
    }

}
