<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Category;
use App\Hashtag;
use App\Publications;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class MyPublicationsController extends Controller
{
    //
    public function __construct(){

    }
    public function index (Request $request){
        if($request){
            //$multimedia=DB::table('multimedia')
            $multimedia=Publications::
            where('user_iduser', '=', Auth::user()->iduser)
            ->orderBy('multimedia.created_at', 'desc')
            ->paginate(10);
            return view('publication.index', ["multimedia"=>$multimedia, "my" => 1]);
        }
    }

    public function create (){
    	return view ('publication.create');
    }

    public function insert (Request $request){
        if ($request->session()->has('user')) {
            return response()->json(['fail', "Debe tener una sesion activa..."]);
        }
        //$has =  explode(",",$request->hashtag);
        //return $has;

        //return $request->comment;

        $validatedData = $request->validate([
            'comment' => 'max:128',
        ]);

        $image = $request->file('file');
        $input = null;
        if(isset($image)){
            $input = uniqid().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $input);
        }

        if($input == null){
            return response()->json(['fail', "Debe subir una imagen valida"]);
        }

        $publication = new Publications;
        $publication->comment = $request->get('comment');
        $publication->route = $input;
        $publication->user_iduser = Auth::user()->iduser;

        $has =  explode(",",$request->hashtag);
        //return $has;
        
        if($this->errorHashag($has) == true){
            return redirect()->back()->with('fail', "La imagen incita violencia"); 
            //return response()->json(['fail', "La imagen incita violencia"]);
        }
        
        //return $this->errorHashag($has) ? "hola" : "Feo";

        $publication->save();
        
        //get all the tags and convert in array
        foreach ($has as $key => $hash_tag) {
            //return $hash_tag;
            $create_tag = Hashtag::firstOrCreate(['hashtag' => $hash_tag]);

            $category = new Category;
            $category->hashtag_idhastag = $create_tag->idhastag;
            $category->multimedia_idmultimedia = $publication->idmultimedia;
            $category->save();
        }

        return redirect()->back()->with('success', "Se creo satisfactoriamente..."); 
        //return response()->json(['success', "Se creo satisfactoriamente..."]); 
    }

    public function errorHashag($hashtag){
        $array = array("violencia", "crimen", "asesinato", "pedofilia", "pelea", "sangriento", "acuchillado", "acribillado", "duglas", "henry");


        foreach ($hashtag as $key => $value) {
            # code...
            if(in_array(strtolower($value), $array) == true) { //
                return true;
            }
        }
        return false;
    }

    public function edit ($id){
        return view("publication.edit", ["multimedia"=>Publications::findOrFail($id)]);
    }

    public function destroy ($id){
        $publication=Publications::findOrFail($id);
        
        if(\File::exists(public_path('img/' . $publication->route))){
            \File::delete(public_path('img/' . $publication->route));
        }
        $publication->delete();

        return Redirect::to('/mypublications');//nomodel/annos
    }

    public function show ($id){
        //return "Publications";
        $multimedia=Publications::
        join('category', 'multimedia.idmultimedia', '=', 'category.multimedia_idmultimedia')
        ->where('category.hashtag_idhastag', '=', $id)
        ->select('multimedia.*')
        ->orderBy('multimedia.created_at', 'desc')
        ->paginate(10);

        return view("publication.index", ["multimedia"=>$multimedia, "my" => 1]);
    }
}
