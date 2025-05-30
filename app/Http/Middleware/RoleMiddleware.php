<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response

    {
        $newRoles = explode('_', $roles);

        if (!Auth::check()) {
            return redirect()->route('admin.loginForm');
        }
        if (!in_array(Auth::user()->role, $newRoles)) {
            return redirect()->route('admin.loginForm')->with("error", "Unauthorised Access");
        }
        return $next($request);
    }
}
