<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function apply(Vacancy $vacancy)
    {
        // Lógica para permitir que o candidato se inscreva em uma vaga
    }

    public function interview(Candidate $candidate)
    {
        // Lógica para iniciar a entrevista com o ChatGPT
    }
}