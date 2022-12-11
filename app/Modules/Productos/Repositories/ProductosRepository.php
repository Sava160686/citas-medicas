<?php
namespace App\Modules\Productos\Repositories;

use App\Models\Productos;

class ProductosRepository{

    public function __construct(){ }

    public function registrarProductos(int $codigoTipo, int $codigoUsuario, string $nombre, string $descripcion, string $imagen, string $valor){
        $registrar = new Productos();
        $registrar->codigo_tipo     = $codigoTipo;
        $registrar->codigo_usuario  = 5;
        $registrar->nombre          = $nombre;
        $registrar->descripcion     = $descripcion;
        $registrar->imagen          = $imagen;
        $registrar->valor           = $valor;
        $registrar->estado          = 'ACT';
        $registrar->fechar          = date('Y-m-d h:i:s');
        $registrar->save();
    }
}
