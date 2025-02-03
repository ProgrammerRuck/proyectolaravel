@extends('adminlte::page')

@section('title', 'Venta de Productos')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Venta de Productos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('ventas.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="producto_id">Producto</label>
                            <select name="producto_id" id="producto_id" class="form-control" required>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}">
                                        {{ $producto->nombre }} - ${{ $producto->precio }} (Stock: {{ $producto->stock }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection