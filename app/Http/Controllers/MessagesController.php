<?php

namespace App\Http\Controllers;

use App\Mail\MyfreebookSupport;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    /**
     * Send an email with the message written in the contact form
     */
    public function store()
    {

        $message = request();
        Mail::to('myfreebooksoporte@gmail.com')->send(new MyfreebookSupport($message));

        return redirect()->route('index.contact')->with('success', 'Tu mensaje a sido enviado correctamente');
    }
}
