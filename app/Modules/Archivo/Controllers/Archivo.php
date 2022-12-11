<?php
namespace App\Modules\Archivo\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Exceptions\ResponseException;
use App\Helpers\ValidateRequest;
use App\Modules\Archivo\Services\ArchivoService;

class Archivo extends Controller {

    protected $archivo_service;

    public function __construct(){
        $this->archivo_service = new ArchivoService();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cargarArchivo(Request $request)
    {
        try {

            ValidateRequest::validate($request->all(), [
                'archivo'   => 'required',
            ]);

            $request->archivo = $request->file('archivo');
            $this->archivo_service->cargarArchivo($request->archivo);
            return $this->archivo_service->HTTPresponse();
        } catch (ResponseException $e) {
            $this->archivo_service->responseError401($e->getMessage(),$e->getData());
            return $this->archivo_service->HTTPresponse();
        }
    }

}
