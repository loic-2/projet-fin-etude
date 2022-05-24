<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use HasFactory;
    protected $table='HISTORIQUE';
    protected $primaryKey='ID_HISTORIQUE';

    public function administrateur()
    {
        $this->belongsTo('App\Models\Administrateur');
    }
}
