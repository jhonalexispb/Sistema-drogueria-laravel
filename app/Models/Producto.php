<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract; 
use OwenIt\Auditing\Auditable;

class Producto extends Model implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'productos';
    protected $fillable = ['nombre', 'caracteristica', 'descripcion', 'registro_sanitario', 'condicion_almacenamiento','precio', 'stock'];
}
