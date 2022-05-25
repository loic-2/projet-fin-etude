<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table='CATEGORIE';
    protected $primaryKey='ID_CATEGORIE';
    public $timestamps = false;
    protected $fillable=[
        'NOM_CATEGORIE'
    ];

    public function projets()
    {
       return $this->belongsToMany('App\Models\Projet','CATEGORIE_PROJET','ID_CATEGORIE','ID_PROJET');
    }
}
