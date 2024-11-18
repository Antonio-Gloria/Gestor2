@extends('adminlte::page')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow" style="width: 100%">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Editar Técnico</h4>
                    </div>
                    <div class="card-body" style="width: 100%">
                        <form action="{{ route('tecnicos.update', $tecnico->id) }}" method="POST"
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
                                    value="{{ old('nombre', $tecnico->nombre) }}" required minlength="3" maxlength="50"
                                    pattern="[A-Za-z0-9 ]+" title="Solo se permiten letras y números">
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido"
                                    value="{{ old('apellido', $tecnico->apellido) }}" required minlength="3" maxlength="50"
                                    pattern="[A-Za-z0-9 ]+" title="Solo se permiten letras y números">
                                @error('apellido')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $tecnico->email) }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    value="{{ old('telefono', $tecnico->telefono) }}">
                                @error('telefono')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('tecnicos.index') }}" class="btn btn-outline-danger">
                                    <i class="fas fa-times-circle"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="fas fa-user-edit"></i> Actualizar Datos del Técnico
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
