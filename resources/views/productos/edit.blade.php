@extends('layouts.app')

@section('titulo', 'Editar productos')

@section('content')
    <br>
    <h3 class="text-center">Editar la informacion del producto</h3>
    <form action="/productos/{{$product->id}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nombreproducto"> Modifique el nombre del producto</label>
            <input name="nombre" id="nombre" value="{{$product->nombre}}" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="descripcion"> Modifique la descripcion del producto</label>
            <input name="descripcion" id="descripcion" value="{{$product->descripcion}}" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="imagen">Cargar imagen del producto</label>
            <br>
            <input name="imagen" id="imagen" type="file">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>


@endsection
