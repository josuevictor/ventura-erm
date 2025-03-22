<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth; // Importação correta
use Illuminate\Support\Facades\Hash; // Importação correta

class UsuarioController extends Controller
{
    public function showRegistrationForm()
    {
        return view('usuario.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'senha' => 'required|string|min:8|confirmed',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->senha),
            'empresa_id' => $request->empresa_id,
        ]);


        Auth::guard('usuario')->login($usuario);

        return redirect()->route('usuario.dashboard');
    }

    public function showLoginForm()
    {
        return view('usuario.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'senha' => 'required|string',
        ]);

        if (Auth::guard('usuario')->attempt(['email' => $request->email, 'password' => $request->senha])) {
            return redirect()->route('usuario.dashboard');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    // App\Http\Controllers\Usuario\UsuarioController.php

    public function dashboard()
    {
        //return view('usuario.dashboard');
        // Recupera o usuário autenticado
        $usuario = Auth::guard('usuario')->user();

        // Recupera os dados da empresa do usuário
        $empresa = $usuario->empresa;

        // Passa os dados para a view
        return view('usuario.dashboard', compact('empresa'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/usuario/login');
    }
}
