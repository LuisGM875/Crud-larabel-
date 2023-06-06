<div class="content-box-large">

    <div class="panel-heading">

        <div class="panel-title">
            <h2>{{ $productos->nombre }}</h2></div>

    </div>

    <div class="panel-body">

        <section class="example mt-4">

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

            <!-- Mostramos todas las imágenes pertenecientes a a este registro -->
            @foreach($imagenes as $img)

                <a data-fancybox="gallery" href="../../storage/images/{{ $img->nombre }}">
                    <img src="../../storage/images/{{ $img->nombre }}" width="200" class="img-fluid">
                </a>

            @endforeach

            <br><br>

            <a href="{{ route('productos') }}" class="btn btn-dark">Volver</a>

        </section>

    </div>

</div>
