<?php
namespace App\Modules\Departamento\Controllers;

use Illuminate\Routing\Controller;
use App\Exceptions\ResponseException;
use App\Modules\Departamento\Services\DepartamentoService;


class Departamento extends Controller {

    protected $departamento_service;


    public function __construct(){
        $this->departamento_service = new DepartamentoService();

    }


    public function listadoDepartamentos()
    {
        try {
            $this->departamento_service->listadoDepartamentos();
            return $this->departamento_service->HTTPresponse();
        } catch (ResponseException $e) {
            $this->departamento_service->responseError401($e->getMessage(),$e->getData());
            return $this->departamento_service->HTTPresponse();
        }
    }

}
