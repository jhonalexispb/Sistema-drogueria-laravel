<?php

namespace App\View\Components\Laboratorio;

use App\Models\Laboratorio;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormularioEdicionLaboratorio extends Component
{

    public function __construct()
    {
    
    }

    public function render(): View|Closure|string
    {
        return view('components.laboratorio.formulario-edicion-laboratorio');
    }
}
