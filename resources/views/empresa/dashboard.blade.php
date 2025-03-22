@extends('layouts.base')

@section('title', 'Dashboard da Empresa')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Dashboard da Empresa</h2>
            <p>Bem-vindo, {{ Auth::guard('empresa')->user()->nome }}!</p>

            <!-- Formulário de logout com método POST -->
            <form action="{{ route('empresa.logout') }}" method="POST">
                @csrf <!-- Token CSRF para segurança -->
                <button type="submit" class="btn btn-danger">Sair</button>
            </form>
        </div>
    </div>
@endsection
