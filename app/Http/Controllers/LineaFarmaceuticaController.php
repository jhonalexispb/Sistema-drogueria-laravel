<?php

namespace App\Http\Controllers;

use App\Models\LineaFarmaceutica;
use Illuminate\Http\Request;

class LineaFarmaceuticaController extends Controller
{
    public function index()
    {   
        $totalLineasFarmaceuticas = LineaFarmaceutica::count();
        if(request('busqueda')){
            $texto = request('busqueda');
            $lineasFarmaceuticas = LineaFarmaceutica::where('nombre','LIKE', '%'.$texto.'%')
                        ->select('nombre','id')
                        ->paginate(30)
                        ->withQueryString();
        } else {
            $lineasFarmaceuticas = LineaFarmaceutica::select('nombre','id')
                        ->paginate(30);
        }
        return view('lineas-farmaceuticas.indexLineaFarmaceutica', compact('lineasFarmaceuticas','totalLineasFarmaceuticas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:255|unique:lineas_farmaceuticas',
        ]);
        LineaFarmaceutica::create($request->all());
        return response()->json(['success' => 'La línea farmacéutica ha sido creada exitosamente.']);
    }

    public function show(LineaFarmaceutica $lineaFarmaceutica)
    {
        //
    }

    public function edit($id)
    {   
        $lineaFarmaceutica = LineaFarmaceutica::find($id);
        return response()->json($lineaFarmaceutica);
    }

    public function update(Request $request, $id)
    {   
        $lineaFarmaceutica = LineaFarmaceutica::find($id);
        $request->validate([
            'nombre' => 'required|max:255|unique:lineas_farmaceuticas,nombre,'.$lineaFarmaceutica->id,
        ]);
        
        $lineaFarmaceutica->fill([
            'nombre' => $request->nombre
        ]);

        $lineaFarmaceutica->update();
        return response()->json(['success' => 'La linea farmaceutica fue actualizada de manera satisfactoria']);
    }

    public function destroy($id)
    {   
        $lineaFarmaceutica = LineaFarmaceutica::find($id);
        $lineaFarmaceutica->delete();
        return redirect()->route('lineasFarmaceuticas.index')->with('info','Linea farmaceutica eliminada de manera satisfactoria');
    }
}
