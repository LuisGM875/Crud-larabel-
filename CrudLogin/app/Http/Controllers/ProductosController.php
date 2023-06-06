<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Productos;
use App\Models\Imgproductos;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;
use Illuminate\Support\Str;
use File;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Productos::select('id', 'nombre', 'precio', 'descripcion', 'stock', 'categoria_id', 'imagenes', 'url')->with('imagenesproductos:nombre')->get();

        //$ib = Productos::find(3)->imagenesproductos;

        //dd($ib);

        // $imagenes = Productos::find(3)->imagenesproductos;

        return view('productos.index', compact('productos'));
    }

    // Crear un Registro (Create)
    public function create()
    {
        $productos = Productos::all();
        return view('productos.crear', compact('productos'));
    }

    // Proceso de Creación de un Registro
    public function store(ItemCreateRequest $request)
    {
        $productos= new Productos();
        $productos->nombre = $request->nombre;
        $productos->precio = $request->precio;
        $productos->descripcion = $request->descripcion;
        $productos->stock = $request->stock;
        $productos->categoria_id = $request->categoria_id;
        $productos->imagenes = date('dmyHi');
        $productos->url = Str::slug($request->nombre, '-');  // URL a partir del nombre y para guardar en la Base de Datos

        $productos->save();
        $ci = $request->file('img');

        // Valida nombre y formato de imagen
        $this->validate($request, [
            'nombre' => 'required',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Recibimos una o varias imágenes y las guardamos en la carpeta 'uploads'
        foreach($request->file('img') as $image)
        {
            $imagen = $image->getClientOriginalName();
            $formato = $image->getClientOriginalExtension();
            $image->storeAs('imagenes', $imagen, 'imagenes');

            // Guardamos el nombre de la imagen en la tabla 'img_productos'
            DB::table('img_productos')->insert(
                [
                    'nombre' => $imagen,
                    'formato' => $formato,
                    'productos_id' => $productos->id,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]
            );

        }

        // Redireccionamos con mensaje
        return redirect('productos')->with('message','Guardado satisfactoriamente !');
    }

    public function show($id)
    {
        //
    }

    public function actualizar($id)
    {
        $productos = Productos::find($id);

        $imagenes = Productos::find($id)->imagenesproductos;

        return view('productos.actualizar', compact('imagenes'), ['productos' => $productos]);
    }

    // Proceso de Actualización de un Registro (Update)
    public function update(ItemUpdateRequest $request, $id)
    {
        $productos= Productos::find($id);
        $productos->nombre = $request->nombre;
        $productos->precio = $request->precio;
        $productos->stock = $request->stock;

        $productos->save();

        $ci = $request->file('img');

        // Si la variable '$ci' no esta vacia, actualizamos el registro con las nuevas imágenes
        if(!empty($ci)){

            // Validamos que el nombre y el formato de imagen esten presentes, tu puedes validar mas campos si deseas
            $this->validate($request, [
                'nombre' => 'required',
                'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            // Recibimos una o varias imágenes y las actualizamos
            foreach($request->file('img') as $image)
            {
                $imagen = $image->getClientOriginalName();
                $formato = $image->getClientOriginalExtension();
                $image->storeAs('imagenes', $imagen, 'imagenes');

                // Actualizamos el nuevo nombre de la(s) imagen(es) en la tabla 'img_productos'
                DB::table('img_productos')->insert(
                    [
                        'nombre' => $imagen,
                        'formato' => $formato,
                        'productos_id' => $productos->id,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ]
                );

            }

        }

        // Redireccionamos con mensaje
        Session::flash('message', 'Producto editado');
        return Redirect::to('productos');
    }

    public function eliminar($id)
    {
        $productos = Productos::find($id);

        // Selecciono las imágenes a eliminar
        $imagen = DB::table('img_productos')->where('productos_id', '=', $id)->get();
        $imgfrm = $imagen->implode('nombre', ',');
        //dd($imgfrm);

        // Creamos una lista con los nombres de las imágenes separadas por coma
        $imagenes = explode(",", $imgfrm);

        // Recorremos la lista de imágenes separadas por coma
        foreach($imagenes as $image){

            $imagenPath = 'storage/imagenes/' . $image;

            // Verificar si la imagen existe antes de eliminarla
            if (Storage::disk('imagenes')->exists($imagenPath)) {
                Storage::disk('imagenes')->delete($imagenPath);
            }

        }


        // Borramos el registro de la tabla 'productos'
        Productos::destroy($id);

        // Borramos las imágenes de la tabla 'img_productos'
        $productos->imagenesproductos()->delete();

        // Redireccionamos con mensaje
        Session::flash('message', 'Productos eliminado');
        return Redirect::to('productos');
    }

    // Eliminar imagen de un Registro
    public function eliminarimagen($id, $bid)
    {
        $productos = Imgproductos::find($id);

        $bi = $bid;

        // Elimino la imagen de la carpeta 'uploads'
        $imagen = Imgproductos::select('nombre')->where('id', '=', $id)->get();
        $imgfrm = $imagen->implode('nombre', ', ');
        //dd($imgfrm);
        Storage::delete($imgfrm);

        Imgproductos::destroy($id);

        // Redireccionamos con mensaje
        Session::flash('message', 'Imagen Eliminada Satisfactoriamente !');
        return Redirect::to('productos/actualizar/'.$bi.'');
    }

    // Detalles del Producto
    public function detallesproducto($id)
    {
        // Seleccionar un registro por su 'id'
        $productos = Productos::where('id','=', $id)->firstOrFail();

        // Seleccionamos las imágenes por su 'id'
        $imagenes = Productos::find($id)->imagenesproducto;

        return view('productos.detallesproducto', compact('productos', 'imagenes'));
    }

}
