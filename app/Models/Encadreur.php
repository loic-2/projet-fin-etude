<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encadreur extends Model
{
    use HasFactory;
    protected $table='ENCADREUR';
    protected $primaryKey='ID_ENCADREUR';
    public $timestamps = true;
    protected $fillable=[
      'NOM_ENCADREUR','PROFESSION_ENCADREUR','TELEPHONE_ENCADREUR'
    ];

    public function encadrement()
    {
       return $this->hasMany('App\Models\Encadrement');
    }

    public function projets()
    {
       return $this->belongsToMany('App\Models\Projet','ENCADREMENT','ID_ENCADREUR','ID_PROJET')->withPivot(
          'ANNEE_ENCADREMENT','TYPE_ENCADREMENT');
    }
}
