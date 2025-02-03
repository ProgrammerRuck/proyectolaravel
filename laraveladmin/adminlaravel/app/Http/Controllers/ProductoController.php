<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Mostrar el formulario para crear un producto
    public function create()
    {
        return view('productos.create');
    }
    
    public function lobby()
    {
    // Obtener todos los productos
    $productos = Producto::all();

    // Pasar los productos a la vista
    return view('productos.lobby', compact('productos'));
    }

    // Guardar un nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.create')
                        ->with('success', 'Producto creado correctamente.');
    }
}
