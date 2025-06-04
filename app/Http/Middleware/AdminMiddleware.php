<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
{
    \Log::info('Headers:', $request->headers->all());

    if (Auth::guard('api')->check()) {
        \Log::info('User:', ['user' => Auth::guard('api')->user()]);
        if (Auth::guard('api')->user()->role === 'admin') {
            return $next($request);
        }
    }

    return response()->json(['message' => 'Unauthorized'], 403);
}
}
