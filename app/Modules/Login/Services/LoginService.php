<?php

namespace App\Modules\Login\Services;

use App\Exceptions\ResponseException;
use App\Exceptions\ServiceResponse;
use App\Modules\Usuarios\Repositories\UsuarioRepository;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

class LoginService extends ServiceResponse
{

    protected $usuario_repository;

    public function __construct()
    {
       $this->usuario_repository = new UsuarioRepository();
    }

    public function ingresoSistema(string $email,string $password){


        $informacion  = $this->usuario_repository->validarIngreso($email,$password);
        if(!$informacion ){
         throw new ResponseException('Warning, El usuario no se encuentra registrado.',[]);
        }
        else if($informacion['estado'] == 'INA'){
            throw new ResponseException('Warning, El usuario se encuentra inactivado.',[]);
        }

        $customClaims = [
            'sub'=>'sbOm',
            'user_id'=> $informacion['usuario_id'],
            'time'=> strtotime('now'),
        ];

        JWTAuth::factory()->setDefaultClaims([]);
        $payload = JWTFactory::customClaims($customClaims)->make();
        $token = (string) JWTAuth::encode($payload);

        $this->responseSuccess(['token' => $token], "Bienvenido al sistema. ");
    }
}
