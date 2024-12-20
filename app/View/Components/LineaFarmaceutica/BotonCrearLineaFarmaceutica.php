<?php

namespace App\View\Components\LineaFarmaceutica;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BotonCrearLineaFarmaceutica extends Component
{
    public bool $texto;
    public function __construct(bool $texto = true,)
    {
        $this->texto = $texto;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.linea-farmaceutica.boton-crear-linea-farmaceutica',[
            'texto' => $this->texto
        ]);
    }
}
