<?php

namespace App\Modules\Archivo\Services;

use App\Exceptions\ResponseException;
use App\Exceptions\ServiceResponse;
use Illuminate\Support\Facades\Log;

class ArchivoService extends ServiceResponse
{

    public function __construct(){}

    public function cargarArchivo($file){
        $fileName = $file->getClientOriginalName();

        $fileName = pathinfo($fileName, PATHINFO_FILENAME);
        $nameFile = str_replace(" ", "_" , $fileName);
        $extension = $file->getClientOriginalExtension();

        $picture = date('His'). '-'. $nameFile . '.' . $extension;
        $file->move(public_path('Files/'), $picture);
        $this->responseSuccess($picture, 'Archivo subido con exito.');
    }
}
