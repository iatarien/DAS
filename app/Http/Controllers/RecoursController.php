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

    public function select($type="",$filters=""){
        $user = Auth::user();
        $patients0 = DB::table("patients")->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        whereNull("desistement")->whereNull("desisteur")->
        whereNotNull("confirmed_by")->select('id_patient',"nom","prenom")->get();
        if($filters !=""){
            $patients = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            where("id_patient",$filters)->get();
        }else {
            $patients = DB::table("patients")->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            whereNull("desistement")->whereNull("desisteur")->
            whereNotNull("confirmed_by")->limit(50)->get();
        }
        return view('recours.select',['user' => $user,"patients"=>$patients,"patients0"=>$patients0,"type"=>$type]);
    }


    /********  DEISTEMENT *********/
   
    public function desisted($filters="")
    {   
        $user = Auth::user();
        $patients0 = DB::table("patients")->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("users","users.id","=","patients.desisted_by")->select('id_patient',"nom","prenom")->get();
        if($filters !=""){
            $patients = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users","users.id","=","patients.desisted_by")->
            where("id_patient",$filters)->get();
        }else {
            $patients = DB::table("patients")->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users","users.id","=","patients.desisted_by")->limit(50)->get();
        }
        foreach($patients as $patient){
            $patient->desisteur_name = DB::table('users')->where('id',$patient->desisteur)->first()->full_name;
        }
        return view('recours.desisted',['user' => $user,"patients"=>$patients,"patients0"=>$patients0]);
    }
    public function desisted_not($filters="")
    {   
        $user = Auth::user();
        $patients0 = DB::table("patients")->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("users","users.id","=","patients.desisteur")->whereNull("desisted_by")->select('id_patient',"nom","prenom")->get();
        if($filters !=""){
            $patients = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users","users.id","=","patients.desisteur")->
            where("id_patient",$filters)->get();
        }else {
            $patients = DB::table("patients")->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users","users.id","=","patients.desisteur")->whereNull("desisted_by")->limit(50)->get();
        }
        return view('recours.desisted_not',['user' => $user,"patients"=>$patients,"patients0"=>$patients0]);
    }
    public function confirm_desistement($id){

        $desisted_by = Auth::user()->id;
        DB::table('patients')->where("id_patient",$id)->
        update(["desisted_by"=>$desisted_by]);

        return Redirect::to('/desistements_not');
    }
    public function confirm_desistements($filters="")
    {   
        $user = Auth::user();
        $patients0 = DB::table("patients")->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("users","users.id","=","patients.desisteur")->whereNull("desisted_by")->select('id_patient',"nom","prenom")->get();
        if($filters !=""){
            $patients = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users","users.id","=","patients.desisteur")->
            where("id_patient",$filters)->get();
        }else {
            $patients = DB::table("patients")->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users","users.id","=","patients.desisteur")->whereNull("desisted_by")->limit(50)->get();
        }
        return view('recours.confirm_desist',['user' => $user,"patients"=>$patients,"patients0"=>$patients0]);
    }
    public function ajouter_desistement($id){
        $user = Auth::user();
        $patient = DB::table('patients')->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("communes","communes.code","=","patients.commune")->
        where("id_patient",$id)->first();
        return view('recours.ajouter_desist',['user'=>$user,"patient"=>$patient]);
    }


    public function delete_desistement($id){
        DB::table('patients')->where("id_patient",$id)->
        update(["desisted_by"=>NULL,
        "desistement"=>NULL,
        "desisteur"=>NULL]);
        
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

    public function recours($filters="")
    {   
        $user = Auth::user();
        $patients0 = DB::table("recours")->
        join("patients","recours.patient","=","patients.id_patient")->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("users","users.id","=","recours.recours_by")->select('id_patient',"nom","prenom")->get();
        if($filters !=""){
            $patients = DB::table("recours")->
            join("patients","recours.patient","=","patients.id_patient")->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users","users.id","=","recours.recours_by")->
            where("id_patient",$filters)->get();
        }else {
            $patients = DB::table("recours")->
            join("patients","recours.patient","=","patients.id_patient")->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users","users.id","=","recours.recours_by")->limit(50)->get();
        }
        foreach($patients as $patient){
            $patient->recours_from = DB::table('users')->where('id',$patient->recours_from)->first()->full_name;
        }
        return view('recours.recours',['user' => $user,"patients"=>$patients,"patients0"=>$patients0]);
    }
    public function recours_not($filters="")
    {   
        $user = Auth::user();
        $patients0 = DB::table("recours")->
        join("patients","recours.patient","=","patients.id_patient")->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("users","users.id","=","recours.recours_from")->
        whereNull("recours_by")->select('id_patient',"nom","prenom")->get();
        if($filters !=""){
            $patients = DB::table("recours")->
            join("patients","recours.patient","=","patients.id_patient")->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users","users.id","=","recours.recours_from")->
            where("id_patient",$filters)->get();
        }else {
            $patients = DB::table("recours")->
            join("patients","recours.patient","=","patients.id_patient")->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users","users.id","=","recours.recours_from")->
            whereNull("recours_by")->limit(50)->get();
        }
        return view('recours.recours_not',['user' => $user,"patients"=>$patients,"patients0"=>$patients0]);
    }
    public function confirm_recours($filters="")
    {   
        $user = Auth::user();
        $patients0 = DB::table("recours")->
        join("patients","recours.patient","=","patients.id_patient")->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("users","users.id","=","recours.recours_from")->
        whereNull("recours_by")->select('id_patient',"nom","prenom")->get();
        if($filters !=""){
            $patients = DB::table("recours")->
            join("patients","recours.patient","=","patients.id_patient")->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users","users.id","=","recours.recours_from")->
            where("id_patient",$filters)->get();
        }else {
            $patients = DB::table("recours")->
            join("patients","recours.patient","=","patients.id_patient")->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users","users.id","=","recours.recours_from")->
            whereNull("recours_by")->limit(50)->get();
        }
        return view('recours.confirm_recours',['user' => $user,"patients"=>$patients,"patients0"=>$patients0]);
    }
    public function ajouter_recours($id){
        $user = Auth::user();
        $patient = DB::table('patients')->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("communes","communes.code","=","patients.commune")->
        where("id_patient",$id)->first();
        return view('recours.ajouter_recours',['user'=>$user,"patient"=>$patient]);
    }
    public function edit_recours($id){
        $user = Auth::user();
        $recours = DB::table('recours')->where('id_recours',$id)->first();
        $patient = DB::table('patients')->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("communes","communes.code","=","patients.commune")->
        where("id_patient",$recours->patient)->first();
        return view('recours.edit_recours',['user'=>$user,"patient"=>$patient,"recours"=>$recours]);
    }
    public function edit_real_recours($id){
        $user = Auth::user();
        $recours = DB::table('recours')->where('id_recours',$id)->first();
        $patient = DB::table('patients')->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("communes","communes.code","=","patients.commune")->
        where("id_patient",$recours->patient)->first();
        return view('recours.edit_real_recours',['user'=>$user,"patient"=>$patient,"recours"=>$recours]);
    }
    public function confirmer_recours($id){
        $user = Auth::user();
        $recours = DB::table('recours')->where('id_recours',$id)->first();
        $patient = DB::table('patients')->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("communes","communes.code","=","patients.commune")->
        where("id_patient",$recours->patient)->first();
        return view('recours.confirmer_recours',['user'=>$user,"patient"=>$patient,"recours"=>$recours]);
    }
    public function insert_recours(Request $request){

        $patient = $request['patient'];
        $old_taux = $request['old_taux'];
        $new_taux = $request['new_taux'];
        $date_recours = $request['date_recours'];
        $recours_from = Auth::user()->id;

        DB::table('recours')->insert(["patient"=>$patient,"old_taux"=>$old_taux,
        "new_taux"=>$new_taux,"date_recours"=>$date_recours,
        "recours_from"=>$recours_from]);

        return Redirect::to('/recours_not');
    }
    public function update_recours(Request $request){

        $recours = $request['recours'];
        $old_taux = $request['old_taux'];
        $new_taux = $request['new_taux'];
        $date_recours = $request['date_recours'];
        $recours_from = Auth::user()->id;

        DB::table('recours')->where('id_recours',$recours)->
        update(["old_taux"=>$old_taux,
        "new_taux"=>$new_taux,"date_recours"=>$date_recours]);

        return Redirect::to('/recours_not');
    }
    public function update_real_recours(Request $request){

        $patient_id = $request['patient'];
        $patient = DB::table("patients")->where('id_patient',$patient_id)->first();
        
        $recours = $request['recours'];
        $new_taux = $request['new_taux'];
        $date_recours = $request['date_recours'];
        $recours_by = Auth::user()->id;


        DB::table('recours')->where('id_recours',$recours)->
        update(["new_taux"=>$new_taux,
        "date_recours"=>$date_recours,"recours_by"=>$recours_by]);

        DB::table('patients')->where('id_patient',$patient_id)->
        update(["date_card"=>$date_recours,"taux"=>$new_taux,"confirmed_by"=>$recours_by]);
        
        return Redirect::to('/recours');
    }
    public function validate_recours(Request $request){

        $patient_id = $request['patient'];
        $patient = DB::table("patients")->where('id_patient',$patient_id)->first();
        
        $recours = $request['recours'];
        $old_taux = $request['old_taux'];
        $new_taux = $request['new_taux'];
        $date_recours = $request['date_recours'];
        $recours_by = Auth::user()->id;
        $old_num = $request['old_num']."/".$patient->year;
        $new_num = $request['new_num'];

        DB::table('recours')->where('id_recours',$recours)->
        update(["old_taux"=>$old_taux,"new_taux"=>$new_taux,"old_num"=>$old_num,"new_num"=>$new_num,
        "date_recours"=>$date_recours,"recours_by"=>$recours_by]);

        DB::table('patients')->where('id_patient',$patient_id)->
        update(["num_card"=>$new_num,"date_card"=>$date_recours,"taux"=>$new_taux,
        "year"=>Date('Y'),"confirmed_by"=>$recours_by]);

        return Redirect::to('/recours_not');
    }
}
