<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract; 
use OwenIt\Auditing\Auditable;

class LineaFarmaceutica extends Model implements AuditableContract
{
    use HasFactory, Auditable, SoftDeletes;

    protected $fillable = ['nombre'];
    protected $table = 'lineas_farmaceuticas';

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
