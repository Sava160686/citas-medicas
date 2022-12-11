<?php

namespace App\Modules\Productos\Services;

use App\Exceptions\ResponseException;
use App\Exceptions\ServiceResponse;
use App\Modules\Productos\Repositories\ProductosRepository;

class ProductosService extends ServiceResponse
{

    protected $productos_repository;

    public function __construct()
    {
       $this->productos_repository  = new ProductosRepository();
    }

    public function registrarProductos(int $codigoTipo, int $codigoUsuario, string $nombre, string $descripcion, string $imagen, string $valor){
        $this->productos_repository->registrarProductos($codigoTipo,  $codigoUsuario,  $nombre,  $descripcion,  $imagen,  $valor);
        $this->responseSuccess([], "Producto registrado con éxito. ");
    }
}
