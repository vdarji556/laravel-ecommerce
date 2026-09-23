<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
     public function handle(Request $request, Closure $next): Response
    {
        // Login check
        if (!session()->has('id')) {
            return redirect()
                ->route('admin.login')
                ->with('error', 'Please login first');
        }

        // Admin check
        if (session('type') !== 'Admin') {
            return redirect('/')
                ->with('error', 'You are not authorized to access admin panel');
        }

        return $next($request);
    }
}
