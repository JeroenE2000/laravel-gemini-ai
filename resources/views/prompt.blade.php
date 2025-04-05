<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Prompt Generator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">AI Prompt Generator</h1>
        <form method="POST" action="{{ route('prompt.handle') }}">
            @csrf
            <div class="mb-3">
                <label for="prompt" class="form-label">Enter your prompt:</label>
                <input type="text" class="form-control" id="prompt" name="prompt" value="{{ old('prompt', $prompt ?? '') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Generate</button>
        </form>

        @if (isset($response))
            <div class="mt-4">
                <h3>Response:</h3>
                <textarea class="form-control" rows="5" readonly>{{ $response }}</textarea>
            </div>
        @endif

        @if (isset($error))
            <div class="alert alert-danger mt-4">
                {{ $error }}
            </div>
        @endif
    </div>
</body>
</html>