<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    //
    protected $table='hashtag';
    protected $primaryKey = "idhastag";

    public $timestamps=false;

    protected $fillable =[
    	'hashtag',
    ];
}
