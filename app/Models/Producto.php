<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract; 
use OwenIt\Auditing\Auditable;

class Producto extends Model implements AuditableContract
{
    use HasFactory, Auditable, SoftDeletes;

    protected $table = 'productos';
    protected $fillable = ['nombre', 'caracteristica', 'descripcion', 'registro_sanitario', 'condicion_almacenamiento','precio', 'stock', 'laboratorio', 'linea_farmaceutica'];

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class);
    }

    public function lineaFarmaceutica()
    {
        return $this->belongsTo(LineaFarmaceutica::class);
    }

    public function condicionesAlmacenamiento()
    {
        return $this->belongsToMany(CondicionAlmacenamiento::class, 'condicion_producto');
    }

    public function principiosActivos()
    {
        return $this->belongsToMany(PrincipioActivo::class, 'productos_principios_activos');
    }
}
