@extends('layouts.base')

@section('title', 'Dashboard do Usuário')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Dashboard do Usuário</h2>
            <p>Bem-vindo, {{ Auth::guard('usuario')->user()->nome }}!</p>

            <!-- Formulário para logout -->
            <form action="{{ route('usuario.logout') }}" method="POST">
                @csrf <!-- Token CSRF para segurança -->
                <button type="submit" class="btn btn-danger">Sair</button>
            </form>
        </div>
    </div>
@endsection
