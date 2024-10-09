<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Services\ChatGPTService;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    protected $chatGPTService;

    public function __construct(ChatGPTService $chatGPTService)
    {
        $this->chatGPTService = $chatGPTService;
    }

    public function createInterview(Interview $interview)
    {
        $resumeText = file_get_contents(storage_path('app/' . $interview->resume->file_path)); // Lê o conteúdo do arquivo do currículo
        $questions = $this->chatGPTService->interviewQuestions($resumeText);

        // Armazenar as perguntas geradas
        $interview->update([
            'questions' => implode("\n", array_column($questions['choices'], 'text'))
        ]);

        return response()->json($questions);
    }

    public function evaluateInterview(Interview $interview, Request $request)
    {
        $evaluation = $this->chatGPTService->evaluateAnswers($interview->questions, $request->answers);
        
        // Armazenar a pontuação da avaliação
        $interview->update([
            'score' => $evaluation['choices'][0]['text'] ?? 0
        ]);

        return response()->json($evaluation);
    }
}