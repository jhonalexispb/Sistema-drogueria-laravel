<?php

namespace App\View\Components\Productos;

use App\Models\Laboratorio;
use App\Models\LineaFarmaceutica;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormularioCreacionProductos extends Component
{
    public $laboratorios;
    public $lineaFarmaceutica;
    public function __construct()
    {
        $this->laboratorios = Laboratorio::all();
        $this->lineaFarmaceutica = LineaFarmaceutica::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.productos.formulario-creacion-productos',[
            'principiosActivos' => $this->laboratorios,
            'lineasFarmaceuticas' => $this->lineaFarmaceutica,
        ]);
    }
}
