<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    protected $table='UTILISATEUR';
    protected $primaryKey='ID_UTILISATEUR';
    public $timestamps = true;
    protected $fillable=[
        'NOM_UTILISATEUR','LOGIN_UTILISATEUR','MATRICULE_UTILISATEUR','TELEPHONE_UTILISATEUR',
        'EMAIL_UTILISATEUR','MOT_DE_PASSE_UTILISATEUR'
    ];
}
