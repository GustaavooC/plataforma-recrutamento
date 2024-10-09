<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Services\ChatGPTService;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    protected $chatGPTService;

    public function __construct(ChatGPTService $chatGPTService)
    {
        $this->chatGPTService = $chatGPTService;
    }

    // Método para análise do currículo (se necessário separadamente)
    public function analyze(Resume $resume)
    {
        // Lê o conteúdo do arquivo do currículo
        $resumeText = file_get_contents(storage_path('app/' . $resume->file_path));

        // Envia o texto para a análise do ChatGPT
        $analysis = $this->chatGPTService->analyzeResume($resumeText);

        // Armazenar a análise na tabela de currículos
        $resume->update([
            'score' => $analysis['choices'][0]['text'] ?? 'Análise não disponível'
        ]);

        // Retorna a análise para ser usada na view (ou para testes)
        return response()->json($analysis);
    }

    // Método para fazer o upload e análise do currículo
    public function upload(Request $request)
    {
        // Validação do arquivo e do user_id
        $request->validate([
            'file' => 'required|mimes:pdf,docx|max:10240', // Validar arquivos PDF ou DOCX
            'user_id' => 'required|exists:users,id', // Validar que o user_id exista na tabela users
        ]);

        // Armazenar o currículo
        $filePath = $request->file('file')->store('resumes');

        // Criar um novo registro de currículo no banco de dados com user_id
        $resume = Resume::create([
            'file_path' => $filePath,
            'user_id' => $request->user_id, // Adiciona o user_id do request
        ]);

        // Lê o conteúdo do currículo recém carregado
        $resumeText = file_get_contents(storage_path('app/' . $resume->file_path));

        // Analisar o currículo usando o serviço ChatGPT
        $analysis = $this->chatGPTService->analyzeResume($resumeText);

        // Verifica se a análise foi bem-sucedida
        $analysisText = $analysis['choices'][0]['text'] ?? 'Análise não disponível';

        // Armazenar a análise na tabela de currículos
        $resume->update([
            'score' => $analysisText,
        ]);

        // Retorna à página de upload com o resultado da análise
        return view('upload', [
            'resume' => $resume,
            'analysis' => $analysisText, // Passa a análise para a view
        ]);
    }

    // Método para exibir a página de upload
    public function showUploadForm()
    {
        return view('upload');  // Retorna a página de upload
    }
}