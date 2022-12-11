<?php
namespace App\Modules\Productos\Tipos\Controllers;

use Illuminate\Routing\Controller;
use App\Exceptions\ResponseException;
use App\Modules\Productos\Tipos\Services\TiposService;

class Tipos extends Controller {

    protected $tipos_service;


    public function __construct(){
        $this->tipos_service = new TiposService();

    }


    public function listadoDepartamentos()
    {
        try {
            $this->tipos_service->listadoDTiposProductos();
            return $this->tipos_service->HTTPresponse();
        } catch (ResponseException $e) {
            $this->tipos_service->responseError401($e->getMessage(),$e->getData());
            return $this->tipos_service->HTTPresponse();
        }
    }

}
