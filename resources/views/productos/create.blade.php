@extends('layouts.app')

@section('titulo', 'Agregar productos')

@section('content')
    <br>
    <h3>Agregar productos</h3>
    <br>
    <form action="/productos" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nombreproducto" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion del producto</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion">
        </div>
        <div class="form-group">
            <label for="imagen">Cargar imagen</label>
            <br>
            <input name="imagen" id="imagen" type="file">
        </div>
        <br>
        <button type="submit" class="btn btn-info">Guardar</button>
    </form>


@endsection
