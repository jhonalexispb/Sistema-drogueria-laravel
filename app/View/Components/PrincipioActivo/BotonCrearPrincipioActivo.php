<?php

namespace App\View\Components\PrincipioActivo;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BotonCrearPrincipioActivo extends Component
{
    public bool $texto;
    public function __construct(bool $texto = true, string $select = '')
    {
        $this->texto = $texto;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.principio-activo.boton-crear-principio-activo',[
            'texto' => $this->texto,
        ]);
    }
}
