<div>

    @if(Session::has('message'))
        <div role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <a href="{{ route('productos/crear', ['categorias_id'=>$categorias_id]) }}" class="btn btn-success mt-4 ml-3">  Agregar
    </a>
        <a href="{{ route('categorias.index') }}" class="btn btn-primary">Volver a Categorías</a>

    <section class="example mt-4">

        <div class="table-responsive">

            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Numero de categoria</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productos as $produc)
                    <tr>
                        <td class="v-align-middle">{{$produc->nombre}}</td>
                        <td class="">{{$produc->descripcion}}</td>
                        <td class="v-align-middle">{{$produc->precio}}</td>
                        <td class="v-align-middle">{{$produc->stock}}</td>
                        <td>{{$produc->categoria_id}}</td>
                        <td class="v-align-middle">
                            <!-- Mostrar preview de la primera imagen si existe -->
                            @if( optional($produc->imagenesproductos()->first())->nombre)
                                <img src="{{ asset('storage/app/imagenes/imagenes/'.$produc->imagenesproductos()->first()->nombre) }}" width="30" class="img-responsive">
                            @endif
                        </td>
                        <td class="v-align-middle">
                            <form action="{{ route('productos/eliminar', ['categorias_id' => $categorias_id,'id' => $produc->id]) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                @method('PUT')
                                @csrf

                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button onclick="location.href='{{ route('productos.detalles', ['categorias_id' => $categorias_id, 'id' => $produc->id]) }}'" href="" type="button" class="btn btn-dark">Ver</button>

                                <a href="{{ route('productos/actualizar',['categorias_id' => $categorias_id,'id' => $produc->id]) }}" class="btn btn-primary">Editar</a>


                                <button type="submit" class="btn btn-danger">Eliminar</button>

                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </section>
        <script type="text/javascript">

            function confirmarEliminar() {
                var x = confirm("Estas seguro de Eliminar?");
                if (x)
                    return true;
                else
                    return false;
            }

        </script>
</div>
