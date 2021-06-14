<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{


    public function index(){
        $patients = Patient::select('cin','nom','age','tel','sexe')->get();
        return view('admin.patient')->with([
            'patients' => $patients
        ]);
    }

    function login()
    {
        return view('user.login');
    }
    function register()
    {
        return view('user.register');
    }
    function save(Request $req)
    {
        $req->validate([
            'nom' => 'required',
            'age' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'sexe' => 'required',
            'password_one' => 'required|min:5|max:15',
            'password_two' => 'required|min:5|max:15',
            'cine' => 'required',
        ]);

        //insertion dans le base de donnees
        $patient = new Patient();
        $patient->cin = $req->cine;
        $patient->nom = $req->nom;
        $patient->email = $req->email;
        $patient->age = $req->age;
        $patient->tel = $req->tel;
        $patient->mot_de_pass = $req->password_two;
        $patient->sexe = $req->sexe;
        $patient->image = null;
        $save = $patient->save();
        if ($save) {
            return back()->with('success', 'Votre compte est creer avec succes');
        } else {
            return back()->with('erreur', 'Erreur d\'enregistrement veuiller verifier les donnees');
        }
    }
}
