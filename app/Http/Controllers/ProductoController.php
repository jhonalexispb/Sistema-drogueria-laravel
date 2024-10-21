<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $totalProductos = Producto::count();
        $productosFueraDeStock = Producto::where('stock','<=', 0)->count();

        if(request('busqueda')){
            $texto = request('busqueda');
            $productos = Producto::where('nombre','LIKE', '%'.$texto.'%')
                        ->orWhere('caracteristica','LIKE', '%'.$texto.'%')
                        ->select('nombre','caracteristica','stock','precio','id')
                        ->orderBy('id', 'desc')
                        ->paginate(30)
                        ->withQueryString();
        } else {
            $productos = Producto::select('nombre','caracteristica','stock','precio','id')
                        ->orderBy('id', 'desc')
                        ->paginate(30);
        }
        return view('productos.indexProducto', compact('productos','totalProductos','productosFueraDeStock'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.createProducto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            /* 'codigo'=>'required', */
            /* 'tipo-producto' =>'required',
            'sale-boleta' =>'required',
            'laboratorio' =>'required', */
            'nombre' =>'required|max:255',
            'caracteristica' =>'required|max:255',
            /* 'condicion-almacenamiento' =>'required', */
        ]);

        // Crear el modelo directamente
        Producto::create($request->all());

        // Redirigir o devolver respuesta
        return redirect()->route('productos.index')->with('success', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('productos.showProducto', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('productos.editProducto', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            /* 'codigo'=>'required', */
            /* 'tipo-producto' =>'required',
            'sale-boleta' =>'required',
            'laboratorio' =>'required', */
            'nombre' =>'required|max:255',
            'caracteristica' =>'required|max:255',
            /* 'condicion-almacenamiento' =>'required', */
        ]);

        $producto->update($request->all());
        return redirect()->route('productos.index')->with('info','Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete(); // Esto usará el SoftDeletes

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
}
