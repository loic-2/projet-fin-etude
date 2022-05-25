<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encadreur extends Model
{
    use HasFactory;
    protected $table='ENCADREUR';
    protected $primaryKey='ID_ENCADREUR';
    public $timestamps = false;

    public function encadrement()
    {
       return $this->hasMany('App\Models\Encadrement');
    }

    public function membres()
    {
       return $this->belongsToMany('App\Models\Membre','ENCADREMENT','ID_ENCADREUR','ID_MEMBRE')->withPivot(
            'ANNEE_ENCADREMENT','TYPE_ENCADREMENT');
    }

    public function projets()
    {
       return $this->belongsToMany('App\Models\Projet','ENCADREMENT','ID_ENCADREUR','ID_PROJET')->withPivot(
          'ANNEE_ENCADREMENT','TYPE_ENCADREMENT');
    }
}
