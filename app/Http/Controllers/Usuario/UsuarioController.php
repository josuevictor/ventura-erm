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
            $request->session()->regenerate();
            return redirect()->intended(route('usuario.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas',
        ])->onlyInput('email');
    }

    // App\Http\Controllers\Usuario\UsuarioController.php

    public function dashboard()
    {
        if (!Auth::guard('usuario')->check()) {
            return redirect()->route('usuario.login')->with('error', 'Você precisa fazer login primeiro');
        }

        $usuario = Auth::guard('usuario')->user();

        if (!$usuario->empresa) {

            return redirect()->back()->with('error', 'Nenhuma empresa associada a este usuário');
        }

        $empresa = $usuario->empresa;

        return view('usuario.dashboard', compact('empresa'));
    }

    public function logout()
    {
        Auth::guard('usuario')->logout();
        return redirect('/usuario/login');
    }
}
