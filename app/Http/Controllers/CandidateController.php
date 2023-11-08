<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    
    public function showCandidates(){
        // Recupera todos los candidatos y sus puntuaciones, por ejemplo
        $candidates = User::with(['experiences', 'skills', 'studies'])
                           ->orderBy('score', 'desc')
                           ->get();

        // Pasar esta información a la vista sin necesidad de autenticación.
        return view('candidates.index', compact('candidates'));
    }
}
