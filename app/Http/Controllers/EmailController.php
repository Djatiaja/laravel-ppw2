<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Mail\DataEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    function index(){
        return view("email.index");
    }

    function send(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        SendMailJob::dispatch($data);
        
        return back()->with('success', 'Email sent successfully!');
    }
}
