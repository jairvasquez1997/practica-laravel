@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar entrada</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('enviar-publicacion', $entry->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                        <div class="form-group">
                            <label for="titulo">Título</label>

                            <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo', $entry->titulo) }}" required autocomplete="titulo">

                            @error('titulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="contenido">Contenido</label>

                            <textarea id="contenido" class="form-control @error('contenido') is-invalid @enderror" name="contenido" required>{{ old('contenido', $entry->contenido) }}</textarea>

                            @error('contenido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Guardar cambios
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
