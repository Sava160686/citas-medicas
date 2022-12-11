<?php

namespace App\Modules\Productos\Tipos\Services;

use App\Exceptions\ResponseException;
use App\Exceptions\ServiceResponse;
use App\Modules\Productos\Tipos\Repositories\TiposRepository;

class TiposService extends ServiceResponse
{

    protected $tipos_repository;

    public function __construct()
    {
       $this->tipos_repository  = new TiposRepository();
    }

    public function listadoDTiposProductos(){
        $listadoTipos = $this->tipos_repository->listadoDTiposProductos();

        if(!$listadoTipos){
           throw new ResponseException('Warning, No se encontro información.',[]);
        }

        $this->responseSuccess($listadoTipos, "Listado de tipos productos. ");
    }
}
