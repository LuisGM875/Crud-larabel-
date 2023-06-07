<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Productos;
use App\Models\Imgproductos;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use File;

class ProductosController extends Controller
{
    public function index($categorias_id)
    {
        $productos = Productos::select('id', 'nombre', 'precio', 'descripcion', 'stock', 'categorias_id', 'imagenes', 'url')
            ->where('categorias_id', $categorias_id)
            ->with('imagenesproductos:nombre')
            ->get();
        return view('productos.index', compact('productos', 'categorias_id'));
    }

    public function create($categorias_id)
    {
        return view('productos/crear', compact('categorias_id'));
    }

    // Proceso de Creación de un Registro
    public function store(Request $request,$categorias_id)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'descripcion' => 'required',
            'stock' => 'required',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $productos = new Productos();
        $productos->nombre = $request->nombre;
        $productos->precio = $request->precio;
        $productos->descripcion = $request->descripcion;
        $productos->stock = $request->stock;
        $productos->categorias_id = $categorias_id;
        $productos->imagenes = date('dmyHi');
        $productos->url = Str::slug($request->nombre, '-');
        $productos->save();

        foreach ($request->file('img') as $image) {
            $imagen = $image->getClientOriginalName();
            $formato = $image->getClientOriginalExtension();
            $image->storeAs('imagenes', $imagen, 'imagenes');

            DB::table('img_productos')->insert([
                'nombre' => $imagen,
                'formato' => $formato,
                'productos_id' => $productos->id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

        }

        return redirect()->route('productos.index', ['categorias_id' => $categorias_id])->with('success', 'Producto creado exitosamente');
    }

    public function show($id)
    {
        //
    }

    public function actualizar($categorias_id, $id)
    {
        $productos = Productos::find($id);

        if ($productos) {
            $imagenes = $productos->imagenesproductos;
            return view('productos.actualizar', compact('imagenes', 'productos', 'categorias_id'));
        } else {
            return redirect()->route('productos.actualizar', ['categorias_id' => $categorias_id])->with('error', 'Producto no encontrado.');
        }
    }

    // Proceso de Actualización
    public function update(Request $request, $categorias_id, $id)
    {
        $productos = Productos::find($id);

        if (!$productos) {
            return redirect()->back()->with('error', 'Producto no encontrado.');
        }

        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $productos->nombre = $request->nombre;
        $productos->precio = $request->precio;
        $productos->stock = $request->stock;
        $productos->save();

        if (!empty($request->file('img'))) {
            foreach ($request->file('img') as $image) {
                $imagen = $image->getClientOriginalName();
                $formato = $image->getClientOriginalExtension();
                $image->storeAs('imagenes', $imagen, 'imagenes');

                DB::table('img_productos')->insert([
                    'nombre' => $imagen,
                    'formato' => $formato,
                    'productos_id' => $productos->id,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
            }
        }

        return redirect()->route('productos/index', ['categorias_id' => $categorias_id])->with('message', 'Producto editado');
    }

    public function eliminar($categorias_id, $id)
    {
        $productos = Productos::find($id);

        if (!$productos) {
            return redirect()->back()->with('error', 'Producto no encontrado.');
        }

        $imagen = DB::table('img_productos')->where('productos_id', '=', $id)->get();
        $imgfrm = $imagen->implode('nombre', ',');
        $imagenes = explode(",", $imgfrm);

        foreach ($imagenes as $image) {
            $imagenPath = 'storage/app/imagenes/imagenes/' . $image;

            if (Storage::disk('imagenes')->exists($imagenPath)) {
                Storage::disk('imagenes')->delete($imagenPath);
            }
        }

        $productos->delete();
        $productos->imagenesproductos()->delete();

        return redirect()->route('productos.index', ['categorias_id' => $categorias_id])->with('message', 'Producto eliminado');
    }

    public function eliminarimagen($categorias_id, $id, $bid)
    {
        $productos = Imgproductos::find($id);
        $bi = $bid;
        $imagen = Imgproductos::select('nombre')->where('id', '=', $id)->get();
        $imgfrm = $imagen->implode('nombre', ', ');
        Storage::delete($imgfrm);
        Imgproductos::destroy($id);

        return redirect()->route('productos/actualizar', ['categorias_id' => $categorias_id, 'id' => $bi])->with('message', 'Imagen eliminada satisfactoriamente');
    }

    public function detallesproducto($id)
    {
        $productos = Productos::where('id', '=', $id)->firstOrFail();
        $imagenes = Productos::find($id)->imagenesproductos;
        return view('productos/detalles', compact('productos', 'imagenes'));
    }

}
