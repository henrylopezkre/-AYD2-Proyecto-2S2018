<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Rank;
use App\Publications;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class RankController extends Controller
{
    //


    public function edit($id){
    	$rank = Rank::firstOrNew(['multimedia_idmultimedia' => $edit, 'user_iduser' => Auth::user()->iduser]);



    }

    public function update(Request $request){
    	//return $request->idmultimedia . "   Salida" ;
    	$salida = $request->idmultimedia;
    	$rank = Rank::firstOrNew(['multimedia_idmultimedia' => $salida, 'user_iduser' => Auth::user()->iduser]);

    	
    	//$rank->like = $request->like;
    	if ($request->like == 1){
    		$rank->like = 1;
    	}
    	else{
    		$rank->like = 2;
    	}
    	//return $salida;
    	$rank->save();
    	//return $salida;
    	//response()->json(['rank' => Publications::where('idmultimedia', '=', $request->idmultimedia)->get()->toArray(), 'success', true]); 
    	return response()->json(['like' => Rank::where('rank.multimedia_idmultimedia', '=', $request->idmultimedia)->where('like', '=', 1)->count(), 'dislike' => Rank::where('rank.multimedia_idmultimedia', '=', $request->idmultimedia)->where('like', '=', 2)->count(), 'success' => true]); 
    }
}
