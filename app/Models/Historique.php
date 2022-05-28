<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use HasFactory;
    protected $table='HISTORIQUE';
    protected $primaryKey='ID_HISTORIQUE';
    public $timestamps=false;
    protected $fillable=[
        'ACTION_HISTORIQUE','ID_ADMINISTRATEUR'
    ];

    public function administrateur()
    {
        return $this->belongsTo('App\Models\Administrateur','ID_ADMINISTRATEUR');
    }
}
