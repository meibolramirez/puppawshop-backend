<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Products;



class ChatBot extends Component
{
    public $message = '';
    public $chatHistory = [];

    public function sendMessage(){

        if (empty($this->message)) return;

        $this->chatHistory[] = ['role' => 'user', 'content' => $this->message];

        // Remove punctuation from the user input
        $cleanedMessage = preg_replace('/[^\w\s]/', '', $this->message);

        // Step 1: Break user message into keywords
        $keywords = collect(explode(' ', strtolower($cleanedMessage)))
            ->filter(fn($word) => strlen($word) > 2)
            ->unique();

        \Log::info('Sanitized User Keywords:', $keywords->toArray());


        // Step 2: Query the products table, using LIKE to find matching products
        $products = Products::query()
            ->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    \Log::info('Search Query: ' . 'name LIKE %' . $word . '%');
                    $query->orWhere('name', 'like', '%' . $word . '%')
                        ->orWhere('description', 'like', '%' . $word . '%');
                }
            })
            ->limit(5)
            ->get();

        \Log::info('Found products:', $products->toArray()); // Log the found products

        // Step 3: Format product list for the system prompt
        $productInfo = $products->isEmpty()
            ? "There are no matching products available right now."
            : $products->map(fn($p) => "- {$p->name}: {$p->description} (\${$p->price})")->implode("\n");

        // Step 4: System prompt with context for the OpenAI API
        $systemPrompt = "You are a helpful chatbot for a pet store called Pup Paw Shop. Use the list of available products below to help the user:\n\n{$productInfo}";

        // Step 5: Call OpenAI API
        $apiKey = env('OPENAI_API_KEY');
        $response = Http::withHeaders([
            'Authorization' => "Bearer $apiKey",
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => $systemPrompt],
                ['role' => 'user', 'content' => $this->message],
            ],
        ]);

        $result = $response->json();

        // Step 6: Display assistant's reply
        if (isset($result['choices'][0]['message']['content'])) {
            $this->chatHistory[] = ['role' => 'assistant', 'content' => $result['choices'][0]['message']['content']];
        } else {
            $error = $result['error']['message'] ?? 'Sorry, something went wrong.';
            $this->chatHistory[] = ['role' => 'assistant', 'content' => "OpenAI error: $error"];
        }

        $this->message = '';
    }

public function render()
    {
        return view('livewire.chat-bot');
    }
}

