<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function create()
    {
        $productos = Producto::all();
        return view('ventas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        // Obtener el producto
        $producto = Producto::findOrFail($request->producto_id);

        // Verificar el stock
        if ($producto->stock < $request->cantidad) {
            return back()->withErrors(['cantidad' => 'No hay suficiente stock.']);
        }

        // Crear la venta
        $venta = Venta::create([
            'total' => $producto->precio * $request->cantidad,
        ]);

        // Crear el detalle de la venta
        DetalleVenta::create([
            'venta_id' => $venta->id,
            'producto_id' => $producto->id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $producto->precio,
            'subtotal' => $producto->precio * $request->cantidad,
        ]);

        // Actualizar el stock del producto
        $producto->stock -= $request->cantidad;
        $producto->save();

        return redirect()->route('ventas.create')->with('success', 'Venta realizada con éxito.');
    }
}
