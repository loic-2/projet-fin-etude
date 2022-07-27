<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    use HasFactory;
    protected $table='VISITE';
    protected $primaryKey='ID_VISITE';
    public $timestamps = false;
    protected $fillable=[
        
    ];
}
