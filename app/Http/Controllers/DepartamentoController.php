<?php

namespace App\Http\Controllers;

use App\Modules\Departamento\Controllers\Departamento ;
use Illuminate\Http\Request;

class DepartamentoController extends Departamento
{

    public function __construct(){
        parent::__construct();
    }
}
