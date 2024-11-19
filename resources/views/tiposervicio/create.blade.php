@extends('adminlte::page')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow" style="width: 100%">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Crear un Nuevo Servicio</h4>
                    </div>
                    <div class="card-body" style="width: 100%">
                        <form action="{{ route('tiposervicios.store') }}" method="POST" enctype="multipart/form-data"
                            id="createForm">
                            @csrf
                            @method('POST')

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
                                    value="{{ old('nombre') }}" required minlength="3" maxlength="50"
                                    pattern="[A-Za-z0-9áéíóúÁÉÍÓÚñÑ ]+"
                                    title="Solo se permiten letras, números, espacios y acentos">
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" required minlength="10" maxlength="255">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('tiposervicios.index') }}" class="btn btn-outline-danger">
                                    <i class="fas fa-times-circle"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="fas fa-plus-circle"></i> Agregar Nuevo Tipo de Servicio
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            document.getElementById('createForm').addEventListener('submit', function(event) {
                let nombre = document.getElementById('nombre').value;
                let descripcion = document.getElementById('descripcion').value;

                if (nombre.length < 3 || descripcion.length < 10) {
                    event.preventDefault();
                    alert("Por favor, complete todos los campos correctamente.");
                }
            });
        </script>
    @endpush
@endsection
