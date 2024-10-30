<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    public function index()
    {   
        $totalLaboratorios = Laboratorio::count();
        if(request('busqueda')){
            $texto = request('busqueda');
            $laboratorios = Laboratorio::where('nombre','LIKE', '%'.$texto.'%')
                        ->select('nombre','id','codigo','margen_minimo')
                        ->orderBy('id', 'desc')
                        ->paginate(30)
                        ->withQueryString();
        } else {
            $laboratorios = Laboratorio::select('nombre','id','codigo','margen_minimo')
                        ->orderBy('id', 'desc')
                        ->paginate(30);
        }
        return view('laboratorios.indexLaboratorio', compact('laboratorios','totalLaboratorios'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre'=>'required|max:255|unique:laboratorios',
                'margen_minimo'=>'required|numeric',
            ]
        );

        // Obtiene el siguiente código
        $codigoSiguiente = Laboratorio::obtenerSiguienteCodigo();

        // Crea el laboratorio usando el siguiente código
        Laboratorio::create([
            'nombre' => $request->nombre,
            'codigo' => $codigoSiguiente,
            'margen_minimo' => $request->margen_minimo,
        ]);
        return response()->json(['success' => 'El laboratorio ha sido creado exitosamente.']);
    }

    public function show(Laboratorio $laboratorio)
    {
        //
    }

    public function edit(Laboratorio $laboratorio)
    {
        return response()->json($laboratorio);
    }

    public function update(Request $request, Laboratorio $laboratorio)
    {
        $request->validate(
            [
                'nombre'=>'required|max:255|unique:laboratorios,nombre,'.$laboratorio->id,
                'margen_minimo'=>'required|numeric',
            ]
        );

        $laboratorio->fill([
            'nombre' => $request->nombre,
            'margen_minimo' => $request->margen_minimo,
        ]);

        $laboratorio->save(); // Guardar los cambios
        return response()->json(['success' => 'El laboratorio ha sido actualizado exitosamente.']);
    }
    public function destroy(Laboratorio $laboratorio)
    {
        $laboratorio->delete();
        return redirect()->route('laboratorios.index')->with('info','Laboratorio eliminado de manera satisfactoria');
    }

    public function siguienteCodigo()
    {
        $nuevoCodigo = Laboratorio::obtenerSiguienteCodigo();
        return response()->json(['codigo' => $nuevoCodigo]);
    }
}
