<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function sendEmail(){
        $user = Auth::user();
        $to_name = $user->email;
        $to_email = 'tomiechague@gmail.com';
        $data = array('name'=>'tomas', 'body' => 'A test mail');
        
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
            ->subject('Laravel Test Mail');
        $message->from('tomiechague@gmail.com','Test Mail');
        });
    }
}
