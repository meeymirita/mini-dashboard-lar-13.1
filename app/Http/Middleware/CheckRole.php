<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = Auth::user();

        if (!$user || $user->role->value !== $role) {
            abort(403);
        }
        \Log::info('Middleware', [
            'выполнен вход' => $user->role,
        ]);
        return $next($request);
    }
}
