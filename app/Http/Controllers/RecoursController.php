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

   
    /********  DEISTEMENT *********/
   
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
    public function desisted_not()
    {   
        $user = Auth::user();
        $patients = DB::table("patients")->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("users","users.id","=","patients.desisteur")->whereNull("desisted_by")->
        get();
        
        return view('recours.desisted_not',['user' => $user,"patients"=>$patients]);
    }
    public function confirm_desistement($id){

        $desisted_by = Auth::user()->id;
        DB::table('patients')->where("id_patient",$id)->
        update(["desisted_by"=>$desisted_by]);

        return Redirect::to('/desistements');
    }
    public function confirm_desistements()
    {   
        $user = Auth::user();
        $patients = DB::table("patients")->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("users","users.id","=","patients.desisteur")->whereNull("desisted_by")->
        get();
        
        return view('recours.confirm_desist',['user' => $user,"patients"=>$patients]);
    }
    public function ajouter_desistement($id){
        $user = Auth::user();
        $patient = DB::table('patients')->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("communes","communes.code","=","patients.commune")->
        where("id_patient",$id)->first();
        return view('recours.ajouter_desist',['user'=>$user,"patient"=>$patient]);
    }

    public function select($type=""){
        $user = Auth::user();
        $patients = DB::table("patients")->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        whereNull("desistement")->whereNull("desisteur")->
        whereNotNull("confirmed_by")->get();

        return view('recours.select',['user' => $user,"patients"=>$patients,"type"=>$type]);
    }

    public function delete_desistement($id){
        DB::table('patients')->where("id_patient",$id)->
        update(["desisted_by"=>"NULL",
        "desistement"=>"NULL",
        "desisteur"=>"NULL"]);
        
        return Redirect::to('/desistements');
    }

    public function desist_patient(Request $request){

        $id = $request['patient'];
        $desistement = $request['desistement'];
        $desisteur = Auth::user()->id;

        DB::table('patients')->where("id_patient",$id)->
        update(["desistement"=>$desistement,"desisteur"=>$desisteur]);

        return Redirect::to('/desistements_not');
    }

       /********  RECOURS *********/
    
}
