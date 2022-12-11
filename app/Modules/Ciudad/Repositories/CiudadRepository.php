<?php
namespace App\Modules\Ciudad\Repositories;

use App\Models\Ciudad;

class CiudadRepository{

    public function __construct(){ }

    public function obtenerCiudadesByDepartamentoId(int $codigoDepartamento){
        return optional(Ciudad::where('codigo_departamento',$codigoDepartamento)->get())->toArray() ?? [];
    }
}
