<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin = Admin::find(Auth::user()->id);
        if($admin->role !== 'admin' ){
            return response()->json([
                "success" => false,
                "message" => "You are not admin"
            ]);
        }

        return $next($request);
    }
}

