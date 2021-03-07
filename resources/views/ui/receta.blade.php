<div class="col-md-4">
    <div class="card shadow">
        <img src="/storage/{{ $receta->imagen }}" alt="imagen receta" class="card-img-top">
        <div class="card-body">
            <h3 class="card-title">{{ $receta->titulo }}</h3>

            <div class="meta-receta d-flex justify-content-between">
                @php
                    $fecha = $receta->created_at
                @endphp

                <p class="text-primary fecha font-weight-bold">
                    <fecha-receta fecha="{{ $fecha }}"></fecha-receta>
                </p>
                <p>{{ count($receta->likes) }} les gustó</p>
            </div>

            <p>{!! Str::words($nueva->preparacion, 10, '...') !!}</p>

            <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}" class="btn btn-primary d-block btn-receta">Ver receta</a>
        </div>
    </div>
</div>
