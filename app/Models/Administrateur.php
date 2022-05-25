<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model
{
    use HasFactory;
    protected $table='ADMINISTRATEUR';
    protected $primaryKey='ID_ADMINISTRATEUR';
    public $timestamps=false;

    public function historiques()
    {
       return $this->hasMany('App\Models\Historique','ID_ADMINISTRATEUR');
    }
}
