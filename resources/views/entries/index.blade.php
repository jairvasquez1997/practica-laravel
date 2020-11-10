@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">{{ $entry->titulo }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $entry->contenido }}

                    @if($entry->user_id === auth()->id())
                    <hr>
                    <a href="{{ route('entradas-edit', $entry->id) }}" class="btn btn-primary">
                        Editar entrada
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
