<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Currículo</title>
</head>

<body>
    <h1>Faça o Upload do Seu Currículo</h1>

    <form action="{{ route('resume.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Selecione o arquivo:</label>
        <input type="file" name="file" required>
        <button type="submit">Enviar</button>
    </form>

    @if (isset($analysis))
        <h2>Resultado da Análise</h2>
        <p><strong>Score:</strong> {{ $resume->score }}</p>
        <p><strong>Feedback da Análise:</strong></p>
        <div>
            <pre>{{ $analysis }}</pre>
        </div>
    @endif
</body>

</html>
