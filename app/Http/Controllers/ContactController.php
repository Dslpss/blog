<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|min:3',
                'email' => 'required|email',
                'message' => 'required|min:10'
            ]);

            Log::info('Tentando enviar email', $validated);

            Mail::raw("Mensagem de: {$validated['name']} ({$validated['email']})\n\n{$validated['message']}", function($message) use ($validated) {
                $message->from($validated['email'], $validated['name'])
                       ->to('dennisemannuel93@gmail.com')
                       ->subject("Contato do Site - {$validated['name']}");
            });

            Log::info('Email enviado com sucesso');
            return back()->with('success', 'Mensagem enviada com sucesso!');

        } catch (\Exception $e) {
            Log::error('Erro ao enviar email: ' . $e->getMessage());
            return back()->with('error', 'Erro ao enviar mensagem. Por favor, tente novamente.');
        }
    }
}
