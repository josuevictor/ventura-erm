@extends('layouts.base')

@section('title', 'Dashboard do Usuário')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Dashboard do Usuário</h2>
            <p>Bem-vindo, {{ Auth::user()->nome }}!</p>
            <a href="{{ route('usuario.logout') }}" class="btn btn-danger">Sair</a>
        </div>
    </div>
@endsection
