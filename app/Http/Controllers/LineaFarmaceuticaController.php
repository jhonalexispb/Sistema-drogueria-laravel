<?php

namespace App\Http\Controllers;

use App\Models\LineaFarmaceutica;
use Illuminate\Http\Request;

class LineaFarmaceuticaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    public function show(LineaFarmaceutica $lineaFarmaceutica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LineaFarmaceutica $lineaFarmaceutica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LineaFarmaceutica $lineaFarmaceutica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LineaFarmaceutica $lineaFarmaceutica)
    {
        //
    }
}
