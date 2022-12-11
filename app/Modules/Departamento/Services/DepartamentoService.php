<?php

namespace App\Modules\Departamento\Services;

use App\Exceptions\ResponseException;
use App\Exceptions\ServiceResponse;
use App\Modules\Departamento\Repositories\DepartamentoRepository;

class DepartamentoService extends ServiceResponse
{

    protected $departamento_repository;

    public function __construct()
    {
       $this->departamento_repository  = new DepartamentoRepository();
    }

    public function listadoDepartamentos(){
        $listadoDepertamentos = $this->departamento_repository->listadoDepartamentos();

        if(!$listadoDepertamentos){
           throw new ResponseException('Warning, No se encontro información.',[]);
        }

        $this->responseSuccess($listadoDepertamentos, "Listado de departamentos. ");
    }
}
