<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract; 
use OwenIt\Auditing\Auditable;

class Laboratorio extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, Auditable;

    protected $fillable = ['nombre','margen_minimo','codigo'];
    protected $table = 'laboratorios';

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    public static function obtenerSiguienteCodigo()
    {
        return (self::max('codigo') ?? 99) + 1; // Si no hay registros, empieza desde 100
    }
}
