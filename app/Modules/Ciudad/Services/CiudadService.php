<?php

namespace App\Modules\Ciudad\Services;

use App\Exceptions\ResponseException;
use App\Exceptions\ServiceResponse;
use App\Modules\Ciudad\Repositories\CiudadRepository;

class CiudadService extends ServiceResponse
{

    protected $ciudad_repository;

    public function __construct()
    {
       $this->ciudad_repository  = new CiudadRepository();
    }

    public function listadoCiudades(int $codigoDepartamento){
        $listadoDCiudades = $this->ciudad_repository->obtenerCiudadesByDepartamentoId($codigoDepartamento);
        if(!$listadoDCiudades){
           throw new ResponseException('Warning, No se encontro información.',[]);
        }

        $this->responseSuccess($listadoDCiudades, "Listado de ciudades. ");
    }
}
