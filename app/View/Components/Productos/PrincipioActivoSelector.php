<?php

namespace App\View\Components\Productos;

use App\Models\PrincipioActivo;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PrincipioActivoSelector extends Component
{
    public $principiosActivos;
    public function __construct()
    {
        $this->principiosActivos = PrincipioActivo::all();
    }

    public function render(): View|Closure|string
    {
        return view('components.productos.principio-activo-selector',[
            'principiosActivos' => $this->principiosActivos,
        ]);
    }
}
