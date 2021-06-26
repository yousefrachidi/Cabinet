<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RendezController extends Controller
{
    //

    //   public function __construct()
    //    {
    //       $this->middleware('auth');
    //   }

    public function show()
    {
        $data = DB::table("rendez_vous")

  ->select("rendez_vous.id_rendez_vous as id" ,"rendez_vous.start_event as start" ,"rendez_vous.end_event as end" , "patients.title"  )

  ->join(DB::raw("(SELECT
  cin ,
  CONCAT (  patients.prenom ,' ',  patients.nom  ) as 'title'

  FROM patients


  ) as patients"),function($join){

    $join->on("patients.cin","=","rendez_vous.cin");

})->get();


          return $data;
    }

    public function add(Request $r)
    {



        $count =  Patient:: where('cin', $r->cin)->count();

        if ($count > 0) {

                $newRendezvous = new  RendezVous();

                 $newRendezvous->cin =  $r->cin ;
                 $newRendezvous->id_reception =  $r->id_reception ;
                 $newRendezvous->start_event =  $r->start_event ;
                 $newRendezvous->end_event =  $r->end_event ;
                 $newRendezvous->type =  $r->type ;
                 $newRendezvous->save();
                 return  $count  ;

        }else{
             return  $count  ;
        }


    }

    public function update(Request $r)
    {
            $update = RendezVous::where('id_rendez_vous', $r->ID_RENDEZ)
            ->update([
                'start_event' => $r->start_event ,
                'end_event' => $r->end_event
             ]);



            return true ;


    }
    public function remove(Request $r)
    {

         $rend = RendezVous::where('id_rendez_vous', $r->id_rendez_vous)->delete();

         return $rend ;


    }
}
