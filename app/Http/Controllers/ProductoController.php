<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        $product = Producto::all();
        return view('productos.index', compact('product'));
    }


    public function create()
    {
        return view('productos.create');
    }


    public function store(Request $request)
    {
        $product = new Producto();
        $product->nombre = $request->input('nombre');
        $product->descripcion = $request->input('descripcion');

        if ($request->hasFile('imagen')){
            $product->imagen = $request->file('imagen')->store('public/productos');
        }

        $product->save();
        return 'Guardado exitoso';
    }


    public function show(string $id)
    {
        $product = Producto::find($id);
        return view('productos.show', compact('product'));
    }


    public function edit(string $id)
    {
        $product = Producto::find($id);
        return view('productos.edit', compact('product'));
    }


    public function update(Request $request, string $id)
    {
        $product = Producto::find($id);
        $product->fill($request->except('imagen'));

        if ($request->hasFile('imagen')){
            $product->imagen = $request->file('imagen')->store('public/productos');
        }
        $product->save();
        return 'Producto actualizado';
    }


    public function destroy(string $id)
    {
        //
    }
}
