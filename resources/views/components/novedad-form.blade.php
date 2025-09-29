<form action="{{$action}}" method="post" class="form-servicio" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">El formulario contiene errores y no puede ser enviado.</div>
        @endif

        <label for="titulo">Título</label>
        <input 
            class="form-control @error('titulo') is-invalid @enderror"
            type="text" 
            id="titulo" 
            name="titulo"
            @error('titulo')
                aria-invalid="true"
                aria-errormessage="error_titulo"
            @enderror
            value="{{ old('titulo', $editando ? $novedad->titulo : null) }}"
            >
        @error('titulo')
            <div class="text-danger" id="error_titulo">{{ $message }}</div>
        @enderror
    

        <label for="contenido">Contenido</label>
        <input 
            type="text" 
            id="contenido" 
            name="contenido"
            @error('contenido')
                aria-invalid="true"
                aria-errormessage="error_contenido"
            @enderror
            value="{{ old('contenido', $editando ? $novedad->contenido : null) }}"
        >
        @error('contenido')
            <div class="text-danger" id="error_contenido">{{ $message }}</div>
        @enderror

        <label for="descripcion">Descripción</label>
        <input 
            type="text" 
            id="descripcion" 
            name="descripcion"
            @error('descripcion')
                aria-invalid="true"
                aria-errormessage="error_descripcion"
            @enderror
            value="{{ old('descripcion', $editando ? $novedad->descripcion : null) }}"
        >
        @error('descripcion')
            <div class="text-danger" id="error_descripcion">{{ $message }}</div>
        @enderror


        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" name="imagen">

        <label for="imagen_descripcion">Descripción de la imagen</label>
        <input 
            type="text" 
            id="imagen_descripcion" 
            name="imagen_descripcion"
            @error('imagen_descripcion')
                aria-invalid="true"
                aria-errormessage="error_imagen_descripcion"
            @enderror
            value="{{ old('imagen_descripcion', $editando ? $novedad->imagen_descripcion : null) }}"
        >
        @error('imagen_descripcion')
            <div class="text-danger" id="error_imagen_descripcion">{{ $message }}</div>
        @enderror

        <button type="submit">{{$editando ? 'Actualizar' : 'Publicar'}}</button>
    </form>