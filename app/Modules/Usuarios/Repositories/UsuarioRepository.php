<?php
namespace App\Modules\Usuarios\Repositories;

use App\Models\Usuarios;

class UsuarioRepository{

    public function __construct(){ }

    public function crearUsuario(int $codigoRol, int $codigoCiudad, string $nombres, string $apellidos, string $direccion, string $correo, string $password){
        $registrar = new Usuarios();
        $registrar->codigo_rol     = $codigoRol;
        $registrar->codigo_ciudad  = $codigoCiudad;
        $registrar->nombres        = $nombres;
        $registrar->apellidos      = $apellidos;
        $registrar->direccion      = $direccion;
        $registrar->correo         = $correo;
        $registrar->password       = md5($password);
        $registrar->fechar         = date('Y-m-d h:i:s');
        $registrar->save();
    }


    public function obtenerInformacionPorCorreo( string $correo){
        return optional(Usuarios::where('correo',$correo)->first())->toArray() ?? [];
    }

    public function validarIngreso(string $email,string $password){
        return optional(Usuarios::where([
                                'correo'   =>$email,
                                'password'=>md5($password),
                            ])
                        ->first())->toArray() ?? [];
    }
}
