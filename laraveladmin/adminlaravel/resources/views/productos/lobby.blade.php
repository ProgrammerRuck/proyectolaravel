@extends('adminlte::page')

@section('title', 'Lobby de Productos')

@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">{{ $producto->nombre }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}
                            </li>
                            <li class="list-group-item">
                                <strong>Stock:</strong> {{ $producto->stock }}
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-success btn-block">Comprar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection