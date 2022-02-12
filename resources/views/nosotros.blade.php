@extends('plantilla')

@section('seccion')

    <h1>Este es mi equipo de trabajo</h1>

    @foreach ($equipo as $item)
        <a href="{{ route('nosotros',$item) }}" class="h4 text-danger">{{ $item }}</a><br>
    @endforeach

    @if (!empty($nombre))
        @switch($nombre)
            @case($nombre == 'Juanito')
                <h2 class="mt-5">El nombre es {{ $nombre }}</h2>
                <p>{{ $nombre }} Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat, provident. Placeat,
                    aliquam? Eum odio ab saepe rerum tempore non ut voluptate sed, alias mollitia maiores iusto exercitationem,
                    possimus itaque beatae.</p>
            @break
            @case($nombre == 'Ignacio')
                <h2 class="mt-5">El nombre es {{ $nombre }}</h2>
                <p>{{ $nombre }} Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat, provident. Placeat,
                    aliquam? Eum odio ab saepe rerum tempore non ut voluptate sed, alias mollitia maiores iusto exercitationem,
                    possimus itaque beatae.</p>

            @break
            @case($nombre == 'Pedrito')
                <h2 class="mt-5">El nombre es {{ $nombre }}</h2>
                <p>{{ $nombre }} Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat, provident. Placeat,
                    aliquam? Eum odio ab saepe rerum tempore non ut voluptate sed, alias mollitia maiores iusto exercitationem,
                    possimus itaque beatae.</p>

            @break
            @default

        @endswitch

    @endif



@endsection
