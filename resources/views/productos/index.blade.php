@extends('layouts.app')

@section('titulo', 'Agregar productos')

@section('content')
    <div>
        <div class="bienv text-center">
            <br>
            <h2>Bienvenido!!!</h2>
            <br>
        </div>
        <h3 class="text-center">Listado de productos disponibles</h3>
        <br>
        <form action="{{ route('productos.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Buscar por nombre" value="{{ request('search') }}">
                <button type="submit" class="btn btn-light">Buscar</button>
            </div>
        </form>
        <div class="row">
            @forelse ($products as $product)
                <div class="col-sm">
                    <div class="card" style="width: 18rem;">
                        <img style="height: 200px; width:250px; margin:20px" src="{{ Storage::url($product->imagen) }}" class="card-img-top mx-auto d-block" alt="{{ $product->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nombre }}</h5>
                            <p class="card-text">{{ $product->descripcion }}</p>
                            <a href="{{ route('productos.show', $product->id) }}" class="btn btn-primary">Ver detalles</a>
                            <form action="{{ route('productos.destroy', $product->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No se encontraron productos.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
