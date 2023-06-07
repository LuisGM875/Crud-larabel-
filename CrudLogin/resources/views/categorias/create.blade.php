
    <h1>Agregar Categoría</h1>

    <form method="POST" action="{{ route('categorias.store') }}">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="descripcion_corta">Descripción Corta:</label>
            <textarea class="form-control" id="descripcion_corta" name="descripcion_corta" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="descripcion_larga">Descripción Larga:</label>
            <textarea class="form-control" id="descripcion_larga" name="descripcion_larga" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

