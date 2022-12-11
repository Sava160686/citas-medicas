<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;

    protected $table      = 'usuarios';
    protected $primaryKey = 'codigo_usuario';
    public $timestamps = false;
    protected $hidden = [];
}
