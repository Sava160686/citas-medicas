<?php
namespace App\Modules\Productos\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Exceptions\ResponseException;
use App\Helpers\ValidateRequest;
use App\Modules\Productos\Services\ProductosService;

class Productos extends Controller {

    protected $producto_service;


    public function __construct(){
        $this->producto_service = new ProductosService();

    }

    public function registrarProductos(Request $request)
    {
        try {
            ValidateRequest::validate($request->all(), [
                'codigoTipo'    => 'required|numeric',
                'codigoUsuario' => 'required|numeric',
                'nombre'      => 'required|string',
                'descripcion'    => 'required|string',
                'imagen'    => 'required|string',
                'valor'       => 'required|string',
            ]);

            $this->producto_service->registrarProductos($request->codigoTipo,$request->codigoUsuario, $request->nombre,$request->descripcion,$request->imagen,$request->valor);
            return $this->producto_service->HTTPresponse();
        } catch (ResponseException $e) {
            $this->producto_service->responseError401($e->getMessage(),$e->getData());
            return $this->producto_service->HTTPresponse();
        }
    }

}
