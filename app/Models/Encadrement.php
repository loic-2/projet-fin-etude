<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encadrement extends Model
{
    use HasFactory;
    protected $table='ENCADREMENT';
    public $timestamps = false;
    public $fillable = ['ID_PROJET','ID_ENCADREUR','TYPE_ENCADREMENT'];

    public function projet()
    {
       return $this->belongsTo('App\Models\Projet');
    }

    public function encadreur()
    {
       return $this->belongsTo('App\Models\Encadreur');
    }
}
