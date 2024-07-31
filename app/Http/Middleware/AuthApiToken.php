<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthApiToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token || !$user = User::where('api_token', hash('sha256', $token))->first()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        Auth::login($user);

        return $next($request);
    }
}
