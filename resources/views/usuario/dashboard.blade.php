@extends('layouts.base') <!-- Use seu layout principal -->

@section('content')
    <div class="container">
        <h1 class="mb-4">Dashboard do Usuário</h1>

        <!-- Exibe os dados do usuário -->
        <div class="card mb-4">
            <div class="card-header">
                Informações do Usuário
            </div>
            <div class="card-body">
                <p><strong>Nome:</strong> {{ Auth::guard('usuario')->user()->nome }}</p>
                <p><strong>Email:</strong> {{ Auth::guard('usuario')->user()->email }}</p>
            </div>
        </div>

        <!-- Exibe os dados da empresa -->
        <div class="card mb-4">
            <div class="card-header">
                Informações da Empresa
            </div>
            <div class="card-body">
                <p><strong>Nome da Empresa:</strong> {{ $empresa->nome }}</p>
                <p><strong>CNPJ:</strong> {{ $empresa->cnpj }}</p>
                <p><strong>Email da Empresa:</strong> {{ $empresa->email }}</p>
            </div>
        </div>

        <!-- Botão de Logout -->
        <div class="text-center">
            <form action="{{ route('usuario.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Sair</button>
            </form>
        </div>
    </div>
@endsection
