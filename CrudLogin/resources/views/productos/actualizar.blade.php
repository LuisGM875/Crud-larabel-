<div class="panel-body">

    <section class="example mt-4">

        <form method="POST" action="{{ route('productos/update',$productos->id) }}" role="form" enctype="multipart/form-data">

            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('productos.frm.prt')

        </form>

    </section>

</div>
