<h1>Editar Categoría</h1>

<form method="POST" action="{{ route('categorias.update', $categoria->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $categoria->nombre }}" required>
    </div>

    <div class="form-group">
        <label for="descripcion_corta">Descripción Corta:</label>
        <textarea class="form-control" id="descripcion_corta" name="descripcion_corta" rows="3" required>{{ $categoria->descripcion_corta }}</textarea>
    </div>

    <div class="form-group">
        <label for="descripcion_larga">Descripción Larga:</label>
        <textarea class="form-control" id="descripcion_larga" name="descripcion_larga" rows="5" required>{{ $categoria->descripcion_larga }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
