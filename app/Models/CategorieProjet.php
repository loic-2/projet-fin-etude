<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieProjet extends Model
{
    use HasFactory;
    protected $table='CATEGORIE_PROJET';
    protected $primaryKey='null';
    public $incrementing=false;
    public $timestamps = false;
    public $fillable =['ID_CATEGORIE','ID_PROJET'];

    public function projet()
    {
        $this->belongsTo('App\Models\Projet');
    }

    public function categorie()
    {
        $this->belongsTo('App\Models\Categorie');
    }
}
