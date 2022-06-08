<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Authenticatable
{
    use HasFactory;
    protected $table='ADMINISTRATEUR';
    protected $primaryKey='ID_ADMINISTRATEUR';
    public $timestamps=false;
    protected $fillable=[
        'NOM_ADMINISTRATEUR','LOGIN_ADMINISTRATEUR','MOT_DE_PASSE_ADMINISTRATEUR',
        'EMAIL_ADMINISTRATEUR','TELEPHONE_ADMINISTRATEUR'
    ];

    public function historiques()
    {
       return $this->hasMany('App\Models\Historique','ID_ADMINISTRATEUR');
    }
}
