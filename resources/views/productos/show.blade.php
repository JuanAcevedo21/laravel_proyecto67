@extends('layouts.app')

@section('titulo', 'Detalle del productos')

@section('content')

<div class="text-center">
    <img style="height: 400px; width:500px; margin:20px" src="{{ Storage::url($product->imagen) }}" class="card-img-top mx-auto d-block" alt="...">
    <div class="card-body">
        <p class="card-text">{{$product->descripcion}}</p>
    </div>
    <br>
    <a href="/productos/{{$product->id}}/edit" class="btn btn-success">Editar producto</a>
</div>


@endsection
