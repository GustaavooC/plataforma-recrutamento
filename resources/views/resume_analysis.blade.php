<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análise de Currículo</title>
</head>

<body>
    <h1>Resultado da Análise do Currículo</h1>

    <h2>Currículo Analisado</h2>
    <p><strong>Nome do candidato:</strong> {{ $resume->candidate_name }}</p>
    <p><strong>Arquivo:</strong> {{ basename(storage_path('app/' . $resume->file_path)) }}</p>

    <h2>Pontuação</h2>
    <p><strong>Score:</strong> {{ $resume->score }}</p>

    <h2>Feedback</h2>
    <p>{{ $analysis['choices'][0]['text'] ?? 'Sem feedback disponível.' }}</p>

    <a href="/">Voltar</a>
</body>

</html>
