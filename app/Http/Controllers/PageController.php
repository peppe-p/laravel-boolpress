<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function chisiamo()
    {
        return view('chisiamo');
    }

    public function contattaci()
    {
        return view('contattaci');
    }

    public function sendForm(Request $request)
    {
        $valData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required | email',
                'body' => 'required'
            ]
        );

        // send an email with the data
        Mail::to('gepsozodri@biyac.com')
            ->cc($valData['email'])
            ->send(new ContactFormMail($valData));
        return redirect()->back()->with('message', 'Message sent successfully');
        //return (new ContactFormMail($valData))->render();
    }
}