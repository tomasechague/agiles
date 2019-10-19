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

    public function sendEmail(Request $request){
        $user = Auth::user();
        $to_name = $user->name;
        $to_email = $user->email;
        $data = array('name'=>$request->get('teacherName'),'body' => 'Buen dia, estoy interesado en tomar una clase, queria saber la disponibilidad horaria, mi mail es: '. $user->email);
        
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
            ->subject('Steacher Contact');
        $message->from('tomiechague@gmail.com','Steacher');
        });
    }
}
