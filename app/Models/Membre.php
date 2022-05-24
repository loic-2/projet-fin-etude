<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    protected $table='MEMBRE';
    protected $primaryKey='ID_MEMBRE';

    public function encadrement()
    {
        $this->hasMany('App\Models\Encadrement');
    }

    public function projet()
    {
        $this->belongsTo('App\Models\Projet');
    }

    public function encadreurs()
    {
        $this->belongsToMany('App\Models\Encadreurs','ENCADREMENT');
    }
}
