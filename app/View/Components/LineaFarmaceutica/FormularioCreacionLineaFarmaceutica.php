<?php

namespace App\View\Components\LineaFarmaceutica;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormularioCreacionLineaFarmaceutica extends Component
{
    public bool $saveLocalstorage; // Propiedad para almacenar el estado
    public string $formName; // Propiedad para almacenar el nombre del formulario
    public function __construct(bool $saveLocalstorage = false, string $formName = '')
    {
        $this->saveLocalstorage = $saveLocalstorage;
        $this->formName = $formName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.linea-farmaceutica.formulario-creacion-linea-farmaceutica', [
            'saveLocalstorage' => $this->saveLocalstorage,
            'formName' => $this->formName,
        ]);
    }
}
