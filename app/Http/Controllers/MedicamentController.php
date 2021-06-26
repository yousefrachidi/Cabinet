<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{


    public function index()
    {
        $medicament = Medicament::all();
        return view('admin.medicament')->with([
            'medicaments' => $medicament
        ]);
    }

    public function store(Request  $request)
    {

        $request->validate([
            'nom' => 'required',
            'type' => 'required',
            'designation' => 'required',
        ]);

        $medicament = new Medicament([
            'nom' => $request->nom,
            'designation' => $request->designation,
            'type' => $request->type
        ]);
        $medicament->save();

        return redirect()->back()->with([
            'message_success' => '<b>' . $request->nom . '</b> est ajouté à la liste des médicaments'
        ]);
    }
}
