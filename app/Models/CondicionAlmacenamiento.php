<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class CondicionAlmacenamiento extends Model
{
    use HasFactory, Auditable;

    protected $fillable = ['nombre'];
    protected $table = 'condicion_almacenamiento';

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'condicion_producto');
    }
}
