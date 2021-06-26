<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Admin;
use App\Models\Ordonnance;
use App\Models\Reception;
use App\Models\RendezVous;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PatientController extends Controller
{



    public function index()
    {
        $patients = Patient::select('cin', 'nom', 'age', 'tel', 'sexe')->get();
        return view('admin.patient')->with([
            'patients' => $patients
        ]);
    }

    public function show($cin)
    {
        $patient = Patient::select('id', 'cin', 'nom', 'age')->where('cin', '=', $cin)->first();
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
        $data = ['patient' => Patient::find(session('patient'))];
        return view('user.profile', $data);
    }

    function monstatus()
    {
        $id = session('patient');
        $patient = Patient::find($id);

        $ordon = ['ordonnances' => Ordonnance::where('cin_patient', $patient->cin)->get()];
        $data = ['patientInfo' => $patient];
        return view('user.utilisateur', $data, $ordon);
    }



    //page consultation
    function consult()
    {
        $id = session('patient');
        $rendezvous = RendezVous::where('id_patient', '=', $id)->get();

        return view("user.consultation")->with([
            'rendezvous' => $rendezvous
        ]);
    }

    //creer un nouveau rendez vous:

    function newRendezvous(Request $req, $id)
    {
        $rendezvous = new RendezVous();
        $rendezvous->id_patient = session('patient');
        $rendezvous->date_rendezvous = $req->calendar_date;

        if ($rendezvous->save()) {
            return response()->json(['status' => 1, 'message' => 'Rendez vous creer avec success! Merci']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Rendez vous creer avec success! Merci']);
        }
    }


    //nouveau patient
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

            $save = $patient->save();
            if ($save) {
                return back()->with('success', 'Votre compte est creer avec succes!');
            } else {
                return back()->with('erreur', 'Erreur d\' enregistrement veuiller verifier les donnees');
            }
        }
    }


    //mis a jour du compte patient*************************************************
    function updatePatient(Request $req, $id)
    {

        $patient = Patient::find($id);

        //verifier si l'utilisateur a changer l'image

        if ($req->hasFile('userimage')) {
            $extAllowed = ['jpg', 'png', 'jpeg'];
            $image = $req->file('userimage');

            //recuperer l'extension de l'image choisit par le patient
            $ext = strtolower($image->getClientOriginalExtension());

            //verifier l'extension de l'image_________________
            if (!in_array($ext, $extAllowed, true)) {
                return back()->with('erreur', 'Veuiller choisir un format JPG/PNG/JPGE');
            }
            $filename = time() . '.' . $ext;
            $image->move('images/userimages/', $filename);
            $oldimage = 'images/userimages/' . $patient->image;

            if ($patient->image != 'user.png') {
                File::delete($oldimage);
            }
            $patient->image = $filename;
        }


        // verifier le changement de mot de passe_____________
        if ($req->password_one != null) {
            if ($req->password_one == $req->password_two) {
                $patient->mot_de_pass = $req->password_one;
            } else {
                return back()->with('erreur', 'Le mot de passe n\'est pas identiques!');
            }
        }

        $patient->nom = $req->nom;
        $patient->email = $req->email;
        $patient->cin = $req->cin;
        $patient->age = $req->age;
        $patient->tel = $req->tel;
        $patient->save();
        return back()->with('success', 'Votre profile est modifier avec success');
    }


    //function to check if user is patient,admin or reception**********************
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
                    return back()->with('erreur', 'L\'adresse électronique que vous avez saisie n\'est associée à aucun compte!');
                } else {
                    //verifier le mot de passe Reception
                    if ($req->password == $reception->mot_de_pass) {

                        //enregistrer le id dans la session de Reception
                        $req->session()->put('reception', $reception->id_reception);
                        //rediriger vers le Reception 
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
                    //rediriger vers le admin
                    return redirect('/dashboard');
                } else {
                    //
                    return back()->with('erreur', 'Mot de passe incorrect!');
                }
            }
        } else {
            //verifier le mot de passe de patient
            if ($req->password == $patient->mot_de_pass) {
                //enregistrer le id dans la session de patient
                $req->session()->put('patient', $patient->id);
                //rediriger vers le patient profile
                return redirect('/consult');
            } else {
                //
                return back()->with('erreur', 'Mot de passe incorrect!');
            }
        }
    }
}
