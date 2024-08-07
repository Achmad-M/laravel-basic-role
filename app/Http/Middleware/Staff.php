<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Staff
{
    public function handle(Request $request, Closure $next)
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        if ($user->role == 4) {
            return $next($request);
        }
        if ($user->role == 2) {
            return redirect()->route('admin');
        }
        if ($user->role == 3) {
            return redirect()->route('depthead');
        }
        if ($user->role == 1) {
            return redirect()->route('superadmin');
        }
        if ($user->role == 5) {
            return redirect()->route('client');
        }
    }
}
