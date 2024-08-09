<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    // Verificación básica en cada método
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (!Auth::check() || session('user') !== 'admin') {
            return redirect()->route('home');
        }

        $query = Producto::query();

        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $query->where('nombre', 'like', "%{$search}%");
        }

        $products = $query->get();
        return view('productos.index', compact('products'));
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

        if ($request->hasFile('imagen')) {
            $product->imagen = $request->file('imagen')->store('public/productos');
        }

        $product->save();
        return redirect()->route('productos.index')->with('success', 'Guardado exitoso');
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

        if ($request->hasFile('imagen')) {
            $product->imagen = $request->file('imagen')->store('public/productos');
        }
        $product->save();
        return redirect()->route('productos.index')->with('success', 'Producto actualizado');
    }

    public function destroy(string $id)
    {
        $product = Producto::find($id);
        if ($product) {
            if ($product->imagen) {
                Storage::delete($product->imagen);
            }
            $product->delete();
            return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
        }
        return redirect()->route('productos.index')->with('error', 'Producto no encontrado');
    }
}
