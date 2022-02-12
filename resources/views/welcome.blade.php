@extends('plantilla')
@section('seccion')


    <body>
        <div class="container my-4">
            <h1 class="display-4">Notas</h1>
        </div>
        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        <form action="{{ route('notas.crear') }}" method="POST">
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

            <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ old('nombre') }}">
            <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2"
                value="{{ old('descripcion') }}">
            <button class="btn btn-primary btn-block" type="submit">Agregar</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notas as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>
                            <a href="{{ route('notas.detalle', $item) }}">
                                {{ $item->nombre }}
                            </a>
                        </td>
                        <td>{{ $item->descripcion }}</td>
                        <td>
                          <a href="{{ route('notas.editar', $item) }}" class="btn btn-warning btn-sm">
                            Editar
                          </a>

                          <form action="{{ route('notas.eliminar') }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                              Eliminar
                            </button>
                            
                          </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
                                                        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
                                                        crossorigin="anonymous">
                            </script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
                                                        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
                                                        crossorigin="anonymous">
                            </script>
                            -->
    </body>
@endsection
