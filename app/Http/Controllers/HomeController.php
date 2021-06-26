<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Contracts\Service\Attribute\Required;
use App\Mail\EmailInscription;
use App\Mail\Email;
use App\Models\Patient;
use App\Models\RendezVous;
use Illuminate\Support\Str;
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

    public function __construct()
    {
       $this->middleware('auth');
   }

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




    //Nouvelle rendez vous
    function rendezvous(Request $req)
    {
        $req->validate([
            'nom' => 'required',
            'tel' => 'required|unique:patients',
            'email' => 'required|unique:patients',
            'calendar' => 'required'
        ]);




        if (session()->has('patient')) {
            return response()->json(['redirect' => '/consult']);
        } else {
            //creer un nouveau Patient
            $patient = new Patient();
            $patient->nom = $req->nom;
            $patient->email = $req->email;
            $patient->tel = $req->tel;
            $patient->mot_de_pass = Str::random(); //generer un mot de passe aleatoire
            $patient->save();
        }


        $patient = Patient::where('email', '=', $req->email)->first();
        $id = $patient->id;

        $rendezvous = new RendezVous();
        $rendezvous->id_patient = $id;
        $rendezvous->date_rendezvous = $req->calendar;
        $rendezvous->save();

        $data = [
            'nom' => $patient->nom,
            'password' => $patient->mot_de_pass,
            'email' => $patient->email
        ];
        Mail::to($req->email)->send(new EmailInscription($data));
        return response()->json(['status' => 1, 'message' => 'L\'email est envoyer avec success! Merci']);
    }
}
