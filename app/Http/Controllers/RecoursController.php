<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB;
use Auth;
use Bcrypt;
use Redirect;
class RecoursController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

   

   
    public function desisted()
    {   
        $user = Auth::user();
        $patients = DB::table("patients")->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("users","users.id","=","patients.desisted_by")->get();
        foreach($patients as $patient){
            $patient->desisteur_name = DB::table('users')->where('id',$patient->desisteur)->first()->full_name;
        }
        return view('recours.desisted',['user' => $user,"patients"=>$patients]);
    }
   
    public function ajouter_desistement($id){
        $user = Auth::user();
        return view('handicaps.ajouter',['user'=>$user]);
    }

    public function select($type=""){
        $user = Auth::user();
        $patients = DB::table("patients")->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        whereNotNull("confirmed_by")->get();

        return view('recours.select',['user' => $user,"patients"=>$patients,"type"=>$type]);
    }

    public function modifier($id){
        $user = Auth::user();
        $handicap = DB::table("handicaps")->where('id_handicap',$id)->first();
        
        return view('handicaps.modifier',['user'=>$user,"handicap"=>$handicap]);
    }


    public function add_handicap(Request $request){

        $name_handicap = $request['name_handicap'];
        $acronym = $request['acronym'];
        $threshold = $request['threshold'];

        $id = DB::table('handicaps')->
        insertGetId(["name_handicap"=>$name_handicap,"acronym"=>$acronym,
        "threshold"=>$threshold]);
        return Redirect::to('/handicaps');
    }

    public function update_handicap(Request $request){

        $id = $request['id'];

        $name_handicap = $request['name_handicap'];
        $acronym = $request['acronym'];
        $threshold = $request['threshold'];
        
        DB::table('handicaps')->where("id_handicap",$id)->
        update(["name_handicap"=>$name_handicap,"acronym"=>$acronym,
        "threshold"=>$threshold]);

        return Redirect::to('/handicaps');
    }

    
}
