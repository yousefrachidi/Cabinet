<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use Illuminate\Http\Request;
use PDF;

class OrdonnanceController extends Controller
{
    public function store(Request $request)
    {
        $data= array(        
            'description' => $request->description,
            'nom_patient' => $request->nom_patient,
            'age' => $request->age
        );
        $uniqid =  uniqid('', true);

        $pdf = PDF::loadView('admin.pdfgenerator', compact('data'));
        $pdf->save('pdf/ordonnances/' . $uniqid . '.pdf');
        $ordonnance = new Ordonnance([
            'cin_patient' => $request->cin_patient,
            'age' => $request->age,
            'id_admin' => session('admin')->id,
            'description' => $uniqid . '.pdf' 
        ]);
        $ordonnance->save();

        return redirect('/patient')->with([
            'message_success' => 'ordonnance pour '. $request->nom_patient .' est ajouté avec success'
        ]);
    }

    public function downloadPDF($path){
        $fullpath = public_path().'\pdf\ordonnances\\'.$path;

        if (file_exists($fullpath))
        {
            //dd('is found');
            return response()->download($fullpath, 'ordonnance.pdf');
        }         
        return redirect()->back()->with([
            'message_error' => '<b>Fichier</b> non trouvé'
        ]);
    }

    public function viewPDF($path){
        $fullpath = public_path().'\pdf\ordonnances\\'.$path;

        if (file_exists($fullpath))
        {
            $headers = [
                'Content-Type' => 'application/pdf'
            ];
            return response()->file($fullpath, $headers);
        }         
        return redirect('/user')>with([
            'message_error' => '<b>Fichier</b> non trouvé'
        ]);
    }
}
