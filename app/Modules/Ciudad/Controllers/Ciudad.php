<?php
namespace App\Modules\Ciudad\Controllers;

use Illuminate\Routing\Controller;
use App\Exceptions\ResponseException;
use App\Modules\Ciudad\Services\CiudadService;


class Ciudad extends Controller {

    protected $ciudad_service;


    public function __construct(){
        $this->ciudad_service = new CiudadService();
    }

    public function listadoCiudades(int $codigoDepartament)
    {
        try {
            $this->ciudad_service->listadoCiudades($codigoDepartament);
            return $this->ciudad_service->HTTPresponse();
        } catch (ResponseException $e) {
            $this->ciudad_service->responseError401($e->getMessage(),$e->getData());
            return $this->ciudad_service->HTTPresponse();
        }
    }

}
