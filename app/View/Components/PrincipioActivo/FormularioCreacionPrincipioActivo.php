<?php

namespace App\View\Components\PrincipioActivo;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormularioCreacionPrincipioActivo extends Component
{
    /**
     * Create a new component instance.
     */
    public string $select;
    public function __construct(string $select = '')
    {
        $this->select = $select;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.principio-activo.formulario-creacion-principio-activo',[
            'select' => $this->select
        ]);
    }
}
