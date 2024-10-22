<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $totalLaboratorios = Laboratorio::count();
        if(request('busqueda')){
            $texto = request('busqueda');
            $laboratorios = Laboratorio::where('nombre','LIKE', '%'.$texto.'%')
                        ->select('nombre','id','codigo','margen_minimo')
                        ->paginate(30)
                        ->withQueryString();
        } else {
            $laboratorios = Laboratorio::select('nombre','id','codigo','margen_minimo')
                        ->paginate(30);
        }
        return view('laboratorios.indexLaboratorio', compact('laboratorios','totalLaboratorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Laboratorio $laboratorio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laboratorio $laboratorio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laboratorio $laboratorio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laboratorio $laboratorio)
    {
        //
    }
}
