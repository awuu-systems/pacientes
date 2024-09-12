<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        #verificar si el token existe en el encabezado de autorización
        $token = $request->header('Authorization');
        $token = PersonalAccessToken::findToken($token);

        #Validar el token
        if(!$token || !$token->tokenable){
            return response()->json(['error' => 'Token no válido'], 401);
        }
        return $next($request);
    }
}
