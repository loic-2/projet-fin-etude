<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encadreur extends Model
{
    use HasFactory;
    protected $table='ENCADREUR';
    protected $primaryKey='ID_ENCADREUR';

    public function encadrement()
    {
        $this->hasMany('App\Models\Encadrement');
    }

    public function membres()
    {
        $this->belongsToMany('App\Models\Membre','ENCADREMENT');
    }

    public function projets()
    {
        $this->belongsToMany('App\Models\Encadreurs','ENCADREMENT');
    }
}
