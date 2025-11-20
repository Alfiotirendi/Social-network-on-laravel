<?php
namespace App\Http\Controllers;

use App\Models\Utente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:utente,username|min:3|max:20',
            'password' => 'required|min:6'
        ]);

        Utente::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('LoginForm');
    }

    public function showLoginForm(Request $request)
    {   
        return view('login');
    }


    public function login (Request $request){
        
        $request->validate([
            'username' => 'required|min:3|max:20',
            'password' => 'required|min:6'
            ]); 
        $utente = Utente::where('username', $request->username)->first();
        if (!$utente || !Hash::check($request->password, $utente->password)) {
            return back()->withErrors(['msg' => 'Credenziali non valide']);
        }
        $request->session()->put('id', $utente->id);
        // Logica di autenticazione qui
        return redirect()->route('home');
    }

    public function updateSettings(Request $request){
        $id = $request->session()->get('id');
        $utente = Utente::find($id);

        $request->validate([
            'username' => 'required|unique:utente,username,'.$id.'|min:3|max:20',
        ]);

        $utente->username = $request->username;

        $utente->save();

        return redirect()->route('settings')->with('success', 'Impostazioni aggiornate con successo.');
    }

    public function deleteAccount(Request $request){
        $id = $request->session()->get('id');
        $utente = Utente::find($id);
        $utente->delete();
        $request->session()->invalidate();
        return redirect()->route('LoginForm');
    }


    public function logout(Request $request){
        $request->session()->invalidate();
        return redirect()->route('LoginForm');
    }
}