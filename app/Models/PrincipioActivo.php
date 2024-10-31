<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract; 
use OwenIt\Auditing\Auditable;

class PrincipioActivo extends Model implements AuditableContract
{
    use HasFactory, Auditable, SoftDeletes;

    protected $fillable = ['nombre','concentracion'];

    protected $table = 'principios_activos';

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'productos_principios_activos');
    }
}
