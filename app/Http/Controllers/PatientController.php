<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Admin;
use App\Models\Reception;
use App\Models\Ordonnance;
use Illuminate\Support\Facades\Hash;


class PatientController extends Controller
{


    public function index(){
        $patients = Patient::select('cin','nom','age','tel','sexe')->get();
        return view('admin.patient')->with([
            'patients' => $patients
        ]);
    }

    public function show($cin){ 
        $patient= Patient::select('cin', 'nom','age')->where('cin', '=', $cin)->first();
        return view("admin.ordonnance")->with([
            'patient' => $patient
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

    function logout()
    {
        if (session()->has('patient')) {
            session()->pull('patient');
        }
        return redirect('/login');
    }

    function monProfile()
    {
        $data = ['patientInfo' => Patient::where('cin', '=', session('patient'))->first()];
        return view('user.profile', $data);
    }

    function monstatus()
    {
        $ordon = ['ordonnances' => Ordonnance::where('cin_patient',session('patient'))->get()];
        $data = ['patientInfo' => Patient::where('cin', '=', session('patient'))->first()];
        return view('user.utilisateur', $data, $ordon);
    }
       

    function save(Request $req)
    {
        $req->validate([
            'nom' => 'required',
            'age' => 'required',
            'email' => 'required|unique:patients',
            'tel' => 'required|unique:patients',
            'sexe' => 'required',
            'password_one' => 'required|min:5|max:15',
            'password_two' => 'required|min:5|max:15',
            'cin' => 'required|unique:patients',
        ]);

        //insertion dans le base de donnees

        if ($req->password_two != $req->password_one) {
            return back()->with('erreur', 'verifier votre mot de passe');
        } else {
            $patient = new Patient();
            $patient->cin = $req->cin;
            $patient->nom = $req->nom;
            $patient->email = $req->email;
            $patient->age = $req->age;
            $patient->tel = $req->tel;
            $patient->mot_de_pass = $req->password_two;
            $patient->sexe = $req->sexe;
            $patient->image = null;
            $save = $patient->save();
            if ($save) {
                return back()->with('success', 'Votre compte est creer avec succes!');
            } else {
                return back()->with('erreur', 'Erreur d\' enregistrement veuiller verifier les donnees');
            }
        }
    }


    function check(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $patient = Patient::where('email', '=', $req->email)->first();
        if (!$patient) {
            $admin = Admin::where('email', '=', $req->email)->first();
            if (!$admin) {
                $reception = Reception::where('email', '=', $req->email)->first();
                if (!$reception) {
                    return back()->with('erreur', 'utilisateur non trouve!');
                } else {
                    //verifier le mot de passe Reception
                    if ($req->password == $reception->mot_de_pass) {
                        //enregistrer le id dans la session de Reception
                        $req->session()->put('reception', $reception->id);
                        //rediriger vers le patient profile
                        return redirect('/dashboard');
                    } else {
                        //
                        return back()->with('erreur', 'Mot de passe incorrect!');
                    }
                }
            } else {
                //verifier le mot de passe Admin
                if ($req->password == $admin->mot_de_pass) {
                    //enregistrer le id dans la session de admin
                    $req->session()->put('admin', $admin);
                    //rediriger vers le patient profile
                    return redirect('/dashboard');
                } else {
                    //
                    return back()->with('erreur', 'Mot de passe incorrect!');
                }
            }
        } else {
            //verifier le mot de passe de patient
            if ($req->password == $patient->mot_de_pass) {
                //enregistrer le cin dans la session de patient
                $req->session()->put('patient', $patient->cin);
                //rediriger vers le patient profile
                return redirect('/mon_profile');
            } else {
                //
                return back()->with('erreur', 'Mot de passe incorrect!');
            }
        }
    }
}
