<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class OpenAIController extends Controller
{
    public function index(Request $Request)
    {
     
         $result = OpenAI::completions()->create([
            "model" => "gpt-3.5-turbo",
            "temperature" => 0.7,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0,
            'max_tokens' => 2048,
            'prompt' => sprintf('Write article about: %s', $Request->text),
            'n'=>1,
        ]);
         
        return response()->json([
            'result' => trim($result->choices[0]->text) ,
        ]);

    }
}
