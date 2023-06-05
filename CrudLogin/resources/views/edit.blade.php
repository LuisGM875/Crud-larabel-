
@section('content')
    <div class="container">
<form action="{{url('registroProducto/'.$productos->id)}}" method="post">
    @csrf
    {{method_field('PATCH')}}
    @include('form',['sesion'=>'Editar']);
</form>
    </div>
@endsection

