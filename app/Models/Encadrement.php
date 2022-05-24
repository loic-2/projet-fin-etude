<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encadrement extends Model
{
    use HasFactory;
    protected $table='ENCADREMENT';

    public function projet()
    {
        $this->belongsTo('App\Models\Projet');
    }

    public function encadreur()
    {
        $this->belongsTo('App\Models\Encadreur');
    }

    public function membre()
    {
        $this->belongsTo('App\Models\Membre');
    }
}
