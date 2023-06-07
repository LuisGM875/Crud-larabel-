@if ( !empty ( $productos->id) )
<div>
    <div>
        <div>
            <h2>{{ $productos->nombre }}</h2>
        </div>
    </div>

    <div>
            <strong>Descripcion:</strong>
            <br> {{ $productos->descripcion }}
            <br>
            <br>

            <strong>Precio:</strong>
            <br> {{ $productos->precio }}
            <br>
            <br>

            <strong>Stock:</strong>
            <br> {{ $productos->stock }}
            <br>
            <br>

            <strong>Creado:</strong>
            <br> {{ $productos->created_at }}
            <br>
            <br>

            <strong>Actualizado:</strong>
            <br> {{ $productos->updated_at }}
            <br>
            <br>

            <strong>Galería de Imágenes:</strong>
            <br>
            @foreach($imagenes as $imagen)
                <a href="{{ asset('storage/imagenes/' . $imagen->nombre) }}">
                    <img src="{{ asset('storage/imagenes/' . $imagen->nombre) }}" width="200" alt="">
                </a>
            @endforeach
            <br>
            <br>

    </div>
</div>
@endif

<a href="{{ route('productos/index', ['categorias_id' => $categorias_id])}}" class="btn btn-warning">Cancelar</a>
