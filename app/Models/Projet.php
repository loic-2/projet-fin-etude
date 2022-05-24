<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $table='PROJET';
    protected $primaryKey='ID_PROJET';

    public function categorie()
    {
        $this->belongsToMany('App\Models\Categorie','CategorierProjet');
    }

    public function encadrement()
    {
        $this->hasMany('App\Models\Encadrement');
    }

    public function membres()
    {
        $this->hasMany('App\Models\Membre');
    }

    public function encadreurs()
    {
        $this->belongsToMany('App\Models\Encadreurs','ENCADREMENT');
    }
}
