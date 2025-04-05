<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeminiAIService;

class PromptController extends Controller
{
    protected $geminiService;

    public function __construct(GeminiAIService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    public function index()
    {
        return view('prompt');
    }

    public function handlePrompt(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string',
        ]);

        $response = $this->geminiService->generateText($request->input('prompt'));

        // Extract the text from the response
        $text = $response['candidates'][0]['content']['parts'][0]['text'] ?? 'No response received.';

        return view('prompt', [
            'response' => $text,
            'prompt' => $request->input('prompt'),
        ]);
    }
}
