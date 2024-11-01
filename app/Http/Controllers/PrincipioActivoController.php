<?php

namespace App\Http\Controllers;

use App\Models\PrincipioActivo;
use Illuminate\Http\Request;

class PrincipioActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalPrincipiosActivos = PrincipioActivo::count();
        if(request('busqueda')){
            $texto = request('busqueda');
            $principiosActivos = PrincipioActivo::where('nombre','LIKE', '%'.$texto.'%')
                        ->select('nombre','id','concentracion')
                        ->paginate(30)
                        ->withQueryString();
        } else {
            $principiosActivos = PrincipioActivo::select('nombre','id','concentracion')
                        ->paginate(30);
        }
        return view('principiosActivos.indexPrincipioActivo', compact('principiosActivos','totalPrincipiosActivos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|max:255',
                'concentracion' => 'max:100'
            ]
        );

        // Eliminar espacios en blanco de nombre
        $nombre = str_replace(' ', '', $request->nombre);

        // Verificar si la combinación ya existe
        $query = PrincipioActivo::where('nombre', $nombre);

        // Solo verificar concentración si está presente
        if ($request->concentracion) {
            $concentracion = str_replace(' ', '', $request->concentracion);
            $query->where('concentracion', $concentracion);
        } else {
            // Si no hay concentración, solo comprobar que el nombre no se repita
            $query->whereNull('concentracion');
        }

        // Comprobar si la combinación ya existe
        $existe = $query->exists();

        if ($existe) {
            return response()->json(['error' => 'Esa combinación ya existe'], 422);
        }

        // Crear el nuevo registro
        $nuevoPrincipioActivo = PrincipioActivo::create($request->all());

        return response()->json([
            'success' => 'El principio activo ha sido creado satisfactoriamente',
            'nuevo' => $nuevoPrincipioActivo
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(PrincipioActivo $principioActivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($principioActivo)
    {   
        $principioActivo = PrincipioActivo::find($principioActivo);
        return response()->json($principioActivo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $principioActivo)
    {
        $principioActivo = PrincipioActivo::find($principioActivo);
        $request->validate(
            [
                'nombre'=>'required|max:255|unique:principios_activos,nombre,'.$principioActivo->id,
            ]
        );

        $principioActivo->fill([
            'nombre' => $request->nombre
        ]);
        $principioActivo->update();
        return response()->json(['success' => 'El principio activo fue actualizado de manera satisfactoria']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($principioActivo)
    {
        $principioActivo = PrincipioActivo::find($principioActivo);
        $principioActivo->delete();
        return redirect()->route('principiosActivos.index')->with('info','El principio activo fue eliminado de manera satisfactoria');
    }
}
