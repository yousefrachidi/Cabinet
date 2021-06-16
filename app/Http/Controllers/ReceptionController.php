<?php

namespace App\Http\Controllers;

use App\Models\Reception;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    public function index(){
        $receptions = Reception::all();
        return view('admin.reception')->with([
            'receptions' => $receptions
        ]);
    }   

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|min:3',
            'prenom' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $reception = new Reception([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mot_de_pass' => $request->password
        ]);

        $reception->save();

        return redirect()->back()->with([
            'message_success' => 'un compte d\'accueil pour <b>'. $request->nom .'</b> a été créé'
        ]);
    }

    public function update($status, $id){
        Reception::where('id_reception', $id)->update(['status' => $status]);
        return redirect()->back();
    }   
}