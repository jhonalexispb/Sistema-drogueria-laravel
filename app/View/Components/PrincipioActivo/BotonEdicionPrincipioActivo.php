<?php

namespace App\View\Components\PrincipioActivo;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BotonEdicionPrincipioActivo extends Component
{
    /**
     * Create a new component instance.
     */
    public $idPrincipioActivo;
    public function __construct($idPrincipioActivo)
    {
        $this->idPrincipioActivo = $idPrincipioActivo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.principio-activo.boton-edicion-principio-activo');
    }
}
