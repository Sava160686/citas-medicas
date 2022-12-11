<?php

namespace App\Modules\Usuarios\Services;

use App\Exceptions\ResponseException;
use App\Exceptions\ServiceResponse;
use App\Modules\Usuarios\Repositories\UsuarioRepository;

class UsuarioService extends ServiceResponse
{

    protected $usuario_repository;

    public function __construct()
    {
       $this->usuario_repository  = new UsuarioRepository();
    }

    public function registrarUsuario(int $codigoRol, int $codigoCiudad, string $nombres, string $apellidos, string $direccion, string $correo, string $password){
        $informacion = $this->usuario_repository->obtenerInformacionPorCorreo($correo);

        if($informacion){
           throw new ResponseException('Warning, El correo electrónico ya se encuentra registrado.',[]);
        }

        $this->usuario_repository->crearUsuario($codigoRol,$codigoCiudad, $nombres,$apellidos,$direccion,$correo,$password);
        $this->responseSuccess([], "Usuario registrado con éxito. ");
    }
}
