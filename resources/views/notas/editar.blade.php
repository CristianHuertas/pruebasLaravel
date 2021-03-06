@extends('plantilla')
@section('seccion')
    <h1>Editar nota {{ $nota->id }}</h1>

    @if (session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif

    <form action="{{ route('notas.update', $nota->id) }}" method="POST">
        {{-- NO SE PUEDE UTILIZAR DIRECTAMENTE EL PUT, HTML NO LO LEE, TOCA CON @ --}}
        @method('PUT')

        {{-- token para evitar que envien formularios desde otra web --}}
        @csrf

        {{-- captura el error y da el mensaje --}}
        @error('nombre')
            <div class="alert alert-danger">El nombre es obligatorio
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('descripcion')
            <div class="alert alert-danger">La descripcion es obligatoria
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror

        <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" 
            value="{{ $nota->nombre }}">
        <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2"
            value="{{ $nota->descripcion }}">
        <button class="btn btn-primary btn-block" type="submit">Guardar Cambios</button>
    </form>



@endsection
