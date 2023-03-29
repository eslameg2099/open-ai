<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class OpenAIController extends Controller
{
    public function index(Request $Request)
    {
     
         $result = OpenAI::completions(6)->create([
            'model' => 'text-davinci-003',
            'temperature'=>1,
            'top_p'=>1,
            'prompt' => $Request->text,
            'max_tokens'=>20,
            'n'=>1,
        ]);
         
        return response()->json([
            'result' => trim($result->choices[0]->text) ,
        ]);

    }
}
