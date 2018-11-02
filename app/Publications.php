<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publications extends Model
{
    //
	protected $table='multimedia';
    protected $primaryKey = "idmultimedia";

    //public $timestamps=false;

    protected $fillable =[
    	'route',
    	'comment',
    	'user_iduser',
    ];

    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];

    public function rank(){
    	return $this->hasMany('App\Rank');
    }

    public function category(){
    	return $this->hasMany('App\Category', 'multimedia_idmultimedia', 'idmultimedia');
    }

    public function rank_like($id){
        return \App\Rank::where('rank.multimedia_idmultimedia', '=', $id)->where('like', '=', 1)->count();
        //return count($this->hasMany('App\Rank')->where('like', '=', 1));
    }

    public function rank_dislike($id){
        return \App\Rank::where('rank.multimedia_idmultimedia', '=', $id)->where('like', '=', 2)->count();
        //return count($this->hasMany('App\Rank')->where('like', '=', 2));
    }


/*
    public function departamentos($id){
        //return $this->belongsTo('App\Departamentos', 'COD_DEPTO');
        return (\App\Departamentos::find($id))->Desc_Deptos;
    }

    public static function municipios($id){
        return municipios::where('COD_DEPTO', '=', $id)->get()->toArray();
    }

    public function establecimientos(){
        return $this->hasMany('App\Establecimientos', 'cod_mupio');
    }



    public function municipios(){
        return $this->hasMany('App\Municipios', 'cod_Depto');
    }   


    public function establecimientos(){
        return $this->hasMany('App\Establecimientos', 'cod_depto');
    }
*/

}
