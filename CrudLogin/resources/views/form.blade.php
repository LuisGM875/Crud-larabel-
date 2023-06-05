
<h1>{{$sesion}} tarea</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<br>
<div class="form-group">
<label for="Titulo"> Titulo </label>
<input type="text" class="form-control" name="Titulo"
       value="{{isset($tarea->titulo)?$tarea->titulo:old('Titulo')}}" placeholder="Titulo" id="Titulo">
<br>
<label for="Descripcion"> Descripcion </label>
<input type="text" class="form-control" name="Descripcion" value="{{ isset($tarea->descripcion)?$tarea->descripcion:old('Descripcion')}}" placeholder="Descripción" id="Descripcion">
<br>
<label for="fecha"> Fecha </label>
<input type="date" class="form-control" name="fecha" value="{{ isset($tarea->fecha)?$tarea->fecha:old('Fecha')}}" id="fecha">
<br>
<label for="Hora"> Hora </label>
<input type="time" name="Hora" value="{{ isset($tarea->hora)?$tarea->hora:old('Hora')}}" id="Hora" class="form-control">
<br>
<label for="Ubicacion"> Ubicación </label>
<input type="text" class="form-control" name="Ubicacion" value="{{ isset($tarea->ubicacion)?$tarea->ubicacion:old('Ubicacion')}}" placeholder="Ubicacion" id="Ubicacion">
<br>
<input class="btn btn-success" type="submit" value="{{$sesion}} tarea">
<a class="btn btn-primary" href="{{url('registroEvento/')}}">Regresar</a>
<br>
    <input class="bg">hola
</div>
<div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
