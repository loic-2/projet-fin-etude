<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $table='PROJET';
    protected $primaryKey='ID_PROJET';
    public $timestamps = true;
    protected $fillable=[
      'NOM_PROJET','TYPE_PROJET','GROUPE_PROJET','PROMOTION_PROJET','VUE_PROJET',
      'LIEN_FICHIER_PROJET','TELECHARGEMENT_PROJET'
    ];

    public function categories()
    {
       return $this->belongsToMany('App\Models\Categorie','CATEGORIE_PROJET','ID_PROJET','ID_CATEGORIE');
    }

    public function encadrement()
    {
       return $this->hasMany('App\Models\Encadrement');
    }

    public function membres()
    {
       return $this->hasMany('App\Models\Membre','ID_PROJET');
    }

    public function members()
    {
       return $this->belongsToMany('App\Models\Membre','ENCADREMENT','ID_PROJET','ID_MEMBRE')
        ->withPivot('ANNEE_ENCADREMENT','TYPE_ENCADREMENT');
    }

    public function encadreurs()
    {
       return $this->belongsToMany('App\Models\Encadreur','ENCADREMENT','ID_PROJET','ID_ENCADREUR')
        ->withPivot('ANNEE_ENCADREMENT','TYPE_ENCADREMENT');
    }
}
