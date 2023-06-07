@if ( !empty ( $productos->id) )
    <div class="form-group">
        <label for="nombre" class="negrita">Nombre:</label>
        <div>
            <input class="form-control" placeholder="Nombre" required="required" name="nombre" type="text" id="nombre" value="{{ $productos->nombre }}">
        </div>
    </div>

    <div class="form-group">
        <label for="descripcion" class="negrita">Descripcion:</label>
        <div>
            <input class="form-control" placeholder="Descripcion" required="required" name="descripcion" type="text" id="descripcion" value="{{ $productos->descripcion }}">
        </div>
    </div>

    <div class="form-group">
        <label for="precio" class="negrita">Precio:</label>
        <div>
            <input class="form-control" placeholder="Precio" required="required" name="precio" type="number" id="precio" value="{{ $productos->precio }}">
        </div>
    </div>

    <div class="form-group">
        <label for="stock" class="negrita">Stock:</label>
        <div>
            <input class="form-control" placeholder="Stock de productos" required="required" name="stock" type="number" id="stock" value="{{ $productos->stock }}">
        </div>
    </div>

    <div class="form-group">
        <label for="categoria_id" class="negrita">Numero de categoria:</label>
        <div>
            <input class="form-control" placeholder="No Categoria" required="required" name="categorias_id" type="number" id="categorias_id" value="{{$productos->categorias_id}}"  disabled>
        </div>
    </div>

    <div class="form-group">
        <label for="img" class="negrita">Selecciona imagen(es):</label>
        <div>
            <input name="img[]" type="file" id="img" multiple="multiple">
            <br>
            <br>

            @if ( !empty ( $productos->imagenes) )

                <span>Imagenes: </span>
                <br>


                @if(Session::has('message'))
                    <div role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                @foreach($imagenes as $imag)
                    <img src="storage/app/imagenes/imagenes/{{$imag->nombre}}" width="200" alt="">
                    <a href="{{ route('productos/eliminarimagen', ['id' => $imag->id, 'bid' => $productos->id,'categorias_id' => $categorias_id]) }}" onclick="return confirmarEliminar();">Eliminar</a>
                @endforeach
            @else
                No se a caragado la imagen
            @endif

        </div>

    </div>

@else

    <div class="form-group">
        <label for="nombre" class="negrita">Nombre:</label>
        <div>
            <input class="form-control" placeholder="Nombre" required="required" name="nombre" type="text" id="nombre">
        </div>
    </div>


    <div class="form-group">
        <label for="precio" class="negrita">Precio:</label>
        <div>
            <input class="form-control" placeholder="Precio" required="required" name="precio" type="number" id="precio">
        </div>
    </div>

    <div class="form-group">
        <label for="descripcion" class="negrita">Descripcion:</label>
        <div>
            <input class="form-control" placeholder="Descripcion" required="required" name="descripcion" type="text" id="descripcion">
        </div>
    </div>

    <div class="form-group">
        <label for="stock" class="negrita">Stock:</label>
        <div>
            <input class="form-control" placeholder="Stock de productos" required="required" name="stock" type="number" id="stock">
        </div>
    </div>

    <div class="form-group">
        <label for="categoria_id" class="negrita">Numero de categoria:</label>
        <div>
            <input class="form-control" placeholder="No Categoria" required="required" name="categorias_id" type="number" id="categorias_id" value="{{ $categorias_id }}"  disabled>
        </div>
    </div>

    <div class="form-group">
        <label for="img" class="negrita">Selecciona una imagen:</label>
        <div>
            <input name="img[]" type="file" id="img" multiple="multiple">
        </div>
    </div>

@endif
<br>
<button type="submit" class="btn btn-info">Guardar</button>

<a href="{{ route('productos/index', ['categorias_id' => $categorias_id])}}" class="btn btn-warning">Cancelar</a>

