<?php

namespace App\View\Components\LineaFarmaceutica;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BotonEdicionLineaFarmaceutica extends Component
{
    /**
     * Create a new component instance.
     */
    public $idLineaFarmaceutica;
    public function __construct($idLineaFarmaceutica)
    {
        $this->idLineaFarmaceutica = $idLineaFarmaceutica;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.linea-farmaceutica.boton-edicion-linea-farmaceutica');
    }
}
