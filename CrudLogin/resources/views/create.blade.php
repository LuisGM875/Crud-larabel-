
@section('content')
    <div class="container">
<form action="{{url('registroProducto')}}" method="post">
    @csrf
    @include('form',['sesion'=>'Crear']);
</form>
    </div>
@endsection
