@extends('layouts.app')


@section('botones')
    @include('ui.navegacion')
@endsection


@section('content')


<h2 class="text-center mb-5">Administra tus recetas</h2>

<div class="col-md-10 mx-auto bg-white p-3">

    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Título</th>
                <th scole="col">Categoría</th>
                <th scole="col">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($recetas as $receta)
                <tr>
                    <td>{{ $receta->titulo }}</td>
                    <td>{{ $receta->categoria->nombre }}</td>
                    <td>
                        <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}" class="btn btn-success mb-2 d-block">Ver</a>
                        <a href="{{ route('recetas.edit', ['receta' => $receta->id]) }}" class="btn btn-dark mb-2 d-block">Editar</a>
                        <eliminar-receta receta-id="{{ $receta->id }}"></eliminar-receta>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="col-12 mt-4 justify-content-center d-flex">
        {{ $recetas->links() }}
    </div>


        <h2 class="text-center my-2">Recetas que te gustan</h2>
        <div class="col-md-10 mx-auto bg-white p-3">
            @if (count($usuario->meGusta) > 0)
                <ul class="list-group">
                    @foreach ($usuario->meGusta as $receta)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <p>{{ $receta->titulo }}</p>
                            <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}" class="btn btn-success mb-2 d-block">Ver</a>

                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center">Aún no te gustó ninguna receta</p>
            @endif
        </div>
</div>


@endsection
