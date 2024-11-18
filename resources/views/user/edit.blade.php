@extends('adminlte::page')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow" style="width: 100%">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Editar Usuario</h4>
                    </div>
                    <div class="card-body" style="width: 100%">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
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
                                <label for="name" class="form-label">Nombre y Apellido</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}"
                                    placeholder="Dejar vacío para no cambiarla">
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Rol</label>
                                <select name="role" class="form-control" required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('users.index') }}" class="btn btn-outline-danger">
                                    <i class="fas fa-times-circle"></i>Cancelar</a>
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="fas fa-user-edit"></i>Actualizar Usuario</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
