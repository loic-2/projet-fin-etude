<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    protected $table='MEMBRE';
    protected $primaryKey='ID_MEMBRE';
    public $timestamps = false;
    protected $fillable=[
        'NOM_MEMBRE','ID_PROJET','FILIERE_MEMBRE','TELEPHONE_MEMBRE'
    ];

    public function encadrement()
    {
        return $this->hasMany('App\Models\Encadrement');
    }

    public function projet()
    {
        return $this->belongsTo('App\Models\Projet','ID_PROJET');
    }

    public function encadreurs()
    {
        return $this->belongsToMany('App\Models\Encadreur','ENCADREMENT','ID_MEMBRE','ID_ENCADREUR')
        ->withPivot('ANNEE_ENCADREMENT','TYPE_ENCADREMENT');
    }
}
