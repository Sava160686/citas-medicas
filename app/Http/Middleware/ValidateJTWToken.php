<?php

namespace App\Http\Middleware;

use App\Helpers\UserTokenUtil;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ValidateJTWToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');

        try{
            JWTAuth::setToken($token);
            $token = JWTAuth::getToken();
            $decode = JWTAuth::decode($token);
            $data_token = json_decode($decode, true);
            UserTokenUtil::$TOKEN_USER = $data_token['user_id'];

            return $next($request);
        }catch(Exception $e){
            return response(['Acceso denegado',$e],401);
        }
    }
}
