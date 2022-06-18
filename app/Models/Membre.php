<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    protected $table='MEMBRE';
    protected $primaryKey='ID_MEMBRE';
    public $timestamps = true;
    protected $fillable=[
        'NOM_MEMBRE','ID_PROJET','FILIERE_MEMBRE','TELEPHONE_MEMBRE'
    ];

    public function projet()
    {
        return $this->belongsTo('App\Models\Projet','ID_PROJET');
    }
}
