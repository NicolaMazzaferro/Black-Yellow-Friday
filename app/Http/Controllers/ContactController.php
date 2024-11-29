<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        // Validazione del form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);
    
        // Prepara i dati per la mail
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'messageContent' => $request->input('message'), // Cambia il nome per evitare collisioni con "message"
        ];
    
        // Invia l'email
        Mail::send('emails.contact', $data, function ($mail) use ($request) {
            $mail->to('black-yellow-friday@noreply.com')
                 ->from($request->input('email'))
                 ->subject('Nuovo messaggio dal modulo di contatto');
        });
    
        return redirect()->route('contact')->with('success', 'Messaggio inviato con successo!');
    }
}
