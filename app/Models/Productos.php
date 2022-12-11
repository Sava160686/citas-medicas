<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table      = 'producto';
    protected $primaryKey = 'codigo_producto';
    public $timestamps = false;
    protected $hidden = [];
}
