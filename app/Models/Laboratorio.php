<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laboratorio extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nombre', 'direccion', 'telefono', 'descripcion'];
    protected $table = 'laboratorios';
}
