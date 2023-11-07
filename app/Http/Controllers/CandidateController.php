<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    
    public function index(){
        if (Auth::check()) {
            // Recupera todos los candidatos y sus puntuaciones, por ejemplo
            $candidates = User::with(['experiences', 'skills', 'studies'])
                               ->orderBy('score', 'desc')
                               ->get();

            // Pasar esta información a la vista.
            return view('candidates.index', compact('candidates'));
        } else {
            // Si no hay un usuario autenticado, redirigir al login o manejarlo de otra manera.
            return redirect()->route('login');
        }
    }
}
