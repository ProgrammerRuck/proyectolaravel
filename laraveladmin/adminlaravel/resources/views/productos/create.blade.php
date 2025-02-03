@extends('adminlte::page')

@section('title', 'Añadir Producto')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Añadir Producto</h3>
                </div>
                <div class="card-body">
                    <!-- Botón para abrir el modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalProducto">
                        Añadir Producto
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-labelledby="modalProductoLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalProductoLabel">Añadir Producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulario para añadir producto -->
                                    <form action="{{ route('productos.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="precio">Precio</label>
                                            <input type="number" name="precio" id="precio" class="form-control"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number" name="stock" id="stock" class="form-control" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection