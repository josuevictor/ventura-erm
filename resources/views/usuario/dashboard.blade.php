@extends('layouts.base')

@section('content')
    <div class="container">
        @auth('usuario')
            <h1 class="mb-4">Dashboard do Usuário</h1>

            <!-- Exibe os dados do usuário -->
            <div class="card mb-4">
                <div class="card-header">
                    Informações do Usuário
                </div>
                <div class="card-body">
                    <p><strong>Nome:</strong> {{ Auth::guard('usuario')->user()->nome ?? 'Não informado' }}</p>
                    <p><strong>Email:</strong> {{ Auth::guard('usuario')->user()->email ?? 'Não informado' }}</p>
                </div>
            </div>

            <!-- Exibe os dados da empresa -->
            @if(isset($empresa))
                <div class="card mb-4">
                    <div class="card-header">
                        Informações da Empresa
                    </div>
                    <div class="card-body">
                        <p><strong>Nome da Empresa:</strong> {{ $empresa->nome ?? 'Não informado' }}</p>
                        <p><strong>CNPJ:</strong> {{ $empresa->cnpj ?? 'Não informado' }}</p>
                        <p><strong>Email da Empresa:</strong> {{ $empresa->email ?? 'Não informado' }}</p>
                    </div>
                </div>
            @else
                <div class="alert alert-warning">
                    Nenhuma informação de empresa disponível.
                </div>
            @endif

            <!-- Botão de Logout -->
            <div class="text-center">
                <form action="{{ route('usuario.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Sair</button>
                </form>
            </div>
        @else
            <div class="alert alert-danger">
                Você não tem permissão para acessar esta página. <a href="{{ route('usuario.login') }}">Faça login</a>.
            </div>
        @endauth
    </div>
@endsection
