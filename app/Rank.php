<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    //
    protected $table='rank';
    protected $primaryKey = "idrank";

    public $timestamps=false;

    protected $fillable =[
    	'like',
    	'multimedia_idmultimedia',
    	'user_iduser',
    ];
}
