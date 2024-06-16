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
<div class="row">
    @foreach ($product as $demanda)
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img style="height: 200px; width:250px; margin:20px" src="{{ Storage::url($demanda->imagen) }}" class="card-img-top mx-auto d-block" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$demanda->nombre}}</h5>
                  <p class="card-text">{{$demanda->descripcion}}</p>
                  <a href="/productos/{{$demanda->id}}" class="btn btn-primary">Ver detalles</a>
                  <form action="{{ route('productos.destroy', $demanda->id) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                </form>
                </div>
            </div>
            <br>
        </div>
    @endforeach
</div>
</div>

@endsection
