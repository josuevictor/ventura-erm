@extends('layouts.base')

@section('title', 'Registro de Usuário')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Registro de Usuário</h2>
            <form action="{{ route('usuario.registrar') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="senha_confirmation" class="form-label">Confirme a Senha</label>
                    <input type="password" name="senha_confirmation" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="empresa_id" class="form-label">Código da Empresa</label>
                    <input type="text" name="empresa_id" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Registrar</button>
            </form>
        </div>
    </div>
@endsection
