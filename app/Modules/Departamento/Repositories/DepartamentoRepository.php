<?php
namespace App\Modules\Departamento\Repositories;

use App\Models\Departamento;

class DepartamentoRepository{

    public function __construct(){ }

    public function listadoDepartamentos(){
        return optional(Departamento::get())->toArray() ?? [];
    }
}
