<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table='category';
    protected $primaryKey = "idcategory";

    public $timestamps=false;

    protected $fillable =[
    	'hashtag_idhastag',
    	'multimedia_idmultimedia',
    ];

    public function hashtag(){
    	return $this->belongsTo('App\Hashtag');
    }
}
