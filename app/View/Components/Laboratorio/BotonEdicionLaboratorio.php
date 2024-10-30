<?php

namespace App\View\Components\Laboratorio;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BotonEdicionLaboratorio extends Component
{
    /**
     * Create a new component instance.
     */
    public $idLaboratorio;
    public function __construct($idLaboratorio)
    {
        $this->idLaboratorio = $idLaboratorio;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.laboratorio.boton-edicion-laboratorio');
    }
}
