<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class OpenAIController extends Controller
{
    public function index(Request $Request)
    {
     
        $result = OpenAI::completions(3)->create([
            'model' => 'text-davinci-003',
            'prompt' => $Request->text,
            'max_tokens'=>2048,
            'n'=>2,
        ]);
         
        return response()->json([
            'result' => $result['choices'],
        ]);

    }
}
