<?php
namespace App\Modules\Usuarios\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Exceptions\ResponseException;
use App\Helpers\ValidateRequest;
use App\Modules\Usuarios\Services\UsuarioService;


class Usuarios extends Controller {

    protected $usuario_service;


    public function __construct(){
        $this->usuario_service = new UsuarioService();

    }



    /**
     * registrarUsuario a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registrarUsuario(Request $request)
    {
        try {
            ValidateRequest::validate($request->all(), [
                'codigoRol'    => 'required|numeric',
                'codigoCiudad' => 'required|numeric',
                'nombres'      => 'required|string',
                'apellidos'    => 'required|string',
                'direccion'    => 'required|string',
                'correo'       => 'required|string',
                'password'     => 'required|string',
            ]);

            $this->usuario_service->registrarUsuario($request->codigoRol,$request->codigoCiudad, $request->nombres,$request->apellidos,$request->direccion,$request->correo,$request->password);
            return $this->usuario_service->HTTPresponse();
        } catch (ResponseException $e) {
            $this->usuario_service->responseError401($e->getMessage(),$e->getData());
            return $this->usuario_service->HTTPresponse();
        }
    }

}
