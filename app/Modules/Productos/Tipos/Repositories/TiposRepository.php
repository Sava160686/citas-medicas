<?php
namespace App\Modules\Productos\Tipos\Repositories;

use App\Models\Tipos;

class TiposRepository{

    public function __construct(){ }

    public function listadoDTiposProductos(){
        return optional(Tipos::get())->toArray() ?? [];
    }
}
