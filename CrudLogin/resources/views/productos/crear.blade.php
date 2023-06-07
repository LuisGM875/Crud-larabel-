<div class="panel-body">

    {{ $message=Session::get('message') }} @include('alerts.request')

    <section class="example mt-4">

        <form method="POST" action="{{ route('productos/store', ['categorias_id' => $categorias_id]) }}" role="form" enctype="multipart/form-data">

            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('productos.frm.prt')

        </form>

    </section>

</div>
