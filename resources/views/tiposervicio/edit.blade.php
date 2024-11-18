@extends('adminlte::page')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow" style="width: 100%">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Editar Tipo de Servicio</h4>
                    </div>
                    <div class="card-body" style="width: 100%">
                        <form action="{{ route('tiposervicios.update', $tiposervicio->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    value="{{ old('nombre', $tiposervicio->nombre) }}" required minlength="3"
                                    maxlength="50" pattern="[A-Za-z0-9 ]+" title="Solo se permiten letras y números">
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" required minlength="10" maxlength="255">{{ old('descripcion', $tiposervicio->descripcion) }}</textarea>
                                @error('descripcion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('tiposervicios.index') }}" class="btn btn-outline-danger">
                                    <i class="fas fa-times-circle"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="fas fa-pencil-alt"></i> Actualizar Tipo de Servicio
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
