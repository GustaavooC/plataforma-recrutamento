<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Análise do Currículo</title>
</head>

<body>
    <h1>Resultado da Análise do Currículo</h1>

    <h2>Currículo: {{ $resume->file_path }}</h2>
    <p><strong>Resultado da Análise:</strong></p>
    <div>
        <pre>{{ $analysis['choices'][0]['text'] ?? 'Análise não disponível' }}</pre>
    </div>

    <a href="{{ url('/resume/upload') }}">Voltar para o Upload de Currículo</a>
</body>

</html>
