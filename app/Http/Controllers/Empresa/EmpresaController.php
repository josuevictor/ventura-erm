<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    public function showRegistrationForm()
    {
        return view('empresa.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|string|max:14|unique:empresas',
            'email' => 'required|string|email|max:255|unique:empresas',
            'senha' => 'required|string|min:8|confirmed',
        ]);

        $empresa = Empresa::create([
            'nome' => $request->nome,
            'cnpj' => $request->cnpj,
            'email' => $request->email,
            'password' => Hash::make($request->senha),
        ]);

        Auth::guard('empresa')->login($empresa);

        return redirect()->route('empresa.dashboard');
    }

    public function showLoginForm()
    {
        return view('empresa.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'senha' => 'required|string',
        ]);

        if (Auth::guard('empresa')->attempt(['email' => $request->email, 'password' => $request->senha])) {
            //return view('empresa.dashboard');
            return redirect()->route('empresa.dashboard');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    public function dashboard()
    {
        return view('empresa.dashboard');
    }

    public function logout()
    {
        Auth::guard('empresa')->logout();
        return redirect('/empresa/login');
    }
}
