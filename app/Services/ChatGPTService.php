<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class ChatGPTService
{
    // Defina a URL da API
    protected $apiUrl = 'https://api.openai.com/v1/completions';

    // Adicione a chave da API como variável de instância
    protected $apiKey;

    public function __construct()
    {
        // Defina a chave da API aqui, usando o env() para obter a variável de ambiente
        $this->apiKey = env('OPENAI_API_KEY');

        // Verifique se a chave foi configurada corretamente
        if (!$this->apiKey) {
            throw new \Exception('API Key is not set in the .env file');
        }
    }

    // Método para analisar o currículo
    public function analyzeResume($resumeText)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->post($this->apiUrl, [
            'model' => 'gpt-4', // Usar GPT-4 para análise mais complexa
            'prompt' => "Analyze the following resume and provide feedback on the qualifications, experience, and skills. Resume: $resumeText",
            'max_tokens' => 500, // Limitar a resposta
        ]);
        
        return $response->json();
    }

    // Método para gerar perguntas de entrevista
    public function interviewQuestions($resumeText)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->post($this->apiUrl, [
            'model' => 'gpt-4',
            'prompt' => "Generate a list of interview questions based on the following resume: $resumeText",
            'max_tokens' => 500,
        ]);

        return $response->json();
    }

    // Método para avaliar as respostas
    public function evaluateAnswers($questions, $answers)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->post($this->apiUrl, [
            'model' => 'gpt-4',
            'prompt' => "Evaluate the following answers to the questions and score them: Questions: $questions, Answers: $answers",
            'max_tokens' => 500,
        ]);
        
        return $response->json();
    }
}