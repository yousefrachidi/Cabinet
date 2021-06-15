<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use Illuminate\Http\Request;

class OrdonnanceController extends Controller
{
    public function store(Request $request){
        $ordonnance = new Ordonnance([
            'cin_patient' => $request->cin_patient,
            'age' => $request->age,
            'id_admin' => session('admin')->id,
            'description' => $request->description
        ]);
        $ordonnance->save();
    } 
}
