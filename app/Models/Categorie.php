<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table='CATEGORIE';
    protected $primaryKey='ID_CATEGORIE';

    public function projet()
    {
        $this->belongsToMany('App\Models\Projet','CategorierProjet');
    }
}
