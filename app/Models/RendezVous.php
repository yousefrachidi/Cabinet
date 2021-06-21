<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    public $table = "rendez_vous";
    use HasFactory;
    protected $fillable = [
        'id_patient',
        'date_rendezvous',
        'start_event',
        'end_event',
        'type'


    ];
}
