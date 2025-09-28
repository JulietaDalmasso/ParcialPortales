<x-layouts.main>
    <x-slot:title>Publicar un nuevo servicio</x-slot:title>
    <h1>Publicar un nuevo servicio</h1>
     
    <form action="{{route('servicios.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="mb-3" >Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control">
        </div>
        <div class="mb-3">
            <label for="precio" class="mb-3" >Precio</label>
            <input type="text" id="precio" name="precio" class="form-control">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="mb-3" >Descripción del servicio</label>
            <textarea type="text" id="descripcion" name="descripcion" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="imagen" class="mb-3" >Imagen</label>
            <input type="file" id="imagen" name="imagen" class="form-control">
        </div>
        <div class="mb-3">
            <label for="imagen_descripcion" class="mb-3" >Descripcion de la imagen</label>
            <input type="text" id="imagen_descripcion" name="imagen_descripcion" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>
</x-layouts.main>