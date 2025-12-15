<?php /** @var boolean $editando */

$categoryIds = $novedad?->categories->pluck('category_id')->all();

?>

<form action="{{ $action }}" method="post" class="form-servicio" enctype="multipart/form-data">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">El formulario contiene errores y no puede ser enviado.</div>
    @endif

    <label for="titulo">Título</label>
    <input class="form-control @error('titulo') is-invalid @enderror" type="text" id="titulo" name="titulo"
        @error('titulo')
                aria-invalid="true"
                aria-errormessage="error_titulo"
            @enderror
        value="{{ old('titulo', $editando ? $novedad->titulo : null) }}">
    @error('titulo')
        <div class="text-danger" id="error_titulo">{{ $message }}</div>
    @enderror


    <label for="contenido">Contenido</label>
    <textarea id="contenido" name="contenido" rows="6" class="form-control @error('contenido') is-invalid @enderror"
        @error('contenido')
                aria-invalid="true"
                aria-errormessage="error_contenido"
            @enderror>{{ old('contenido', $editando ? $novedad->contenido : null) }}</textarea>
    @error('contenido')
        <div class="text-danger" id="error_contenido">{{ $message }}</div>
    @enderror

    <label for="descripcion">Descripción</label>
    <textarea id="descripcion" name="descripcion" rows="3"
        class="form-control @error('descripcion') is-invalid @enderror"
        @error('descripcion')
                aria-invalid="true"
                aria-errormessage="error_descripcion"
            @enderror>{{ old('descripcion', $editando ? $novedad->descripcion : null) }}</textarea>
    @error('descripcion')
        <div class="text-danger" id="error_descripcion">{{ $message }}</div>
    @enderror

    <fieldset>
        <legend>Categorías</legend>
        @foreach ($categories as $category)
            @php
                $inputId = 'category_' . $category->category_id;
            @endphp

            <div class="categoria-item">
                <input type="checkbox" id="{{ $inputId }}" name="categories[]" value="{{ $category->category_id }}"
                    @checked(in_array($category->category_id, old('categories', $categoryIds ?? [])))>
                <label for="{{ $inputId }}">{{ $category->name }}</label>
            </div>
        @endforeach
    </fieldset>

    @if ($editando)
        <div>
            <p>Imagen actual:</p>
            @if ($novedad->imagen && \Storage::exists($novedad->imagen))
                <img src="{{ \Storage::url($novedad->imagen) }}" alt="{{ $novedad->imagen_descripcion }}">
            @else
                No hay imagen disponible
            @endif
        </div>
    @endif

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" name="imagen">

    <label for="imagen_descripcion">Descripción de la imagen</label>
    <input type="text" id="imagen_descripcion" name="imagen_descripcion"
        @error('imagen_descripcion')
                aria-invalid="true"
                aria-errormessage="error_imagen_descripcion"
            @enderror
        value="{{ old('imagen_descripcion', $editando ? $novedad->imagen_descripcion : null) }}">
    @error('imagen_descripcion')
        <div class="text-danger" id="error_imagen_descripcion">{{ $message }}</div>
    @enderror

    <button type="submit">{{ $editando ? 'Actualizar' : 'Publicar' }}</button>
</form>
