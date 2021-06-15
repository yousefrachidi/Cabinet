<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Contracts\Service\Attribute\Required;
use App\Mail\Email;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    //send email
    function send(Request $req)
    {
        $req->validate([
            'nom' => 'required',
            'tel' => 'required',
            'message' => 'required',

        ]);



        $data = [
            'nom' => $req->nom,
            'tel' => $req->tel,
            'message' => $req->message
        ];

        Mail::to('elouasti@gmail.com')->send(new Email($data));
        return response()->json(['status' => 1, 'message' => 'L\'email est envoyer avec success! Merci']);
    }

    function rendezvous(Request $req)
    {
        $req->validate([
            'nom' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'calendar' => 'required'
        ]);
    }
}
