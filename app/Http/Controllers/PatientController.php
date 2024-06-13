<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB;
use Auth;
use Bcrypt;
use Redirect;
use DateTime;
use stdClass;
use Response;
class PatientController extends Controller
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

     
    public function show_patients($filters="")
    {   

        $user = Auth::user();
        
        if($filters !=""){
            $patients = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users",'users.id',"=","patients.user_id")->
            where("id_patient",$filters)->get();
        }else{
            $patients = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users",'users.id',"=","patients.user_id")->
            whereNull("confirmed_by")->whereNull("rejected_by")->orderBy('id_patient',"DESC")->limit(50)->get();
        }

        $patients0 = DB::table('patients')->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("users",'users.id',"=","patients.user_id")->
        whereNull("confirmed_by")->whereNull("rejected_by")->select('id_patient',"nom","prenom")->get();
       
        

        return view('patients.patients',['user' => $user,"patients"=>$patients,"patients0"=>$patients0]);
        
    }
    public function validate_patient($id)
    {   
        $user = Auth::user();
        $handicaps = DB::table('handicaps')->get();
        $patient = DB::table('patients')->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("communes","communes.code","=","patients.commune")->
        where("id_patient",$id)->first();
        $communes = DB::table('communes')->where('code','!=','00')->orderBy('code','ASC')->get();
        return view('patients.confirm',['user' => $user,"handicaps"=>$handicaps,
        "patient"=>$patient,"communes"=>$communes]);
        
    }
    public function validate_patients($filters="")
    {   
        $user = Auth::user();
        
        if($filters !=""){
            $patients = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users",'users.id',"=","patients.user_id")->
            where("id_patient",$filters)->get();
        }else {
            $patients = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users",'users.id',"=","patients.user_id")->
            whereNull("confirmed_by")->whereNull("rejected_by")->
            whereNull("rejected_by")->whereNull("desisted_by")->whereNull("desistement")->
            orderBy('id_patient',"DESC")->limit(50)->get();
        }
        $patients0 = DB::table('patients')->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("users",'users.id',"=","patients.user_id")->
        whereNull("confirmed_by")->whereNull("rejected_by")->
        whereNull("rejected_by")->whereNull("desisted_by")->whereNull("desistement")->
        select('id_patient',"nom","prenom")->get();
        return view('patients.validate',['user' => $user,"patients"=>$patients,"patients0"=>$patients0]);
        
    }
    public function validated_patients($filters="")
    {   
        $user = Auth::user();
        $patients0 = DB::table('patients')->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("users",'users.id',"=","patients.confirmed_by")->
        whereNull("rejected_by")->whereNull("desisted_by")->whereNull("desistement")->
        whereNotNull("confirmed_by")->select('id_patient',"nom","prenom")->get();
        if($filters !=""){
            $patients = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users",'users.id',"=","patients.confirmed_by")->
            where("id_patient",$filters)->get();
        }else {
            $patients = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->whereNotNull("patients.nom")->whereNotNull("patients.prenom")->
            join("users",'users.id',"=","patients.confirmed_by")->
            whereNotNull("confirmed_by")->
            whereNull("rejected_by")->whereNull("desisted_by")->whereNull("desistement")->
            orderBy('id_patient',"DESC")->limit(50)->get();
        }

        return view('patients.validated_patients',['user' => $user,"patients"=>$patients,"patients0"=>$patients0]);
        
    }
    public function rejected_patients($filters="")
    {   
        $user = Auth::user();

        if($filters !=""){
            $patients = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users",'users.id',"=","patients.rejected_by")->
            where("id_patient",$filters)->get();
        }else {
            $patients = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->
            join("users",'users.id',"=","patients.rejected_by")->
            whereNotNull("rejected_by")->orderBy('id_patient',"DESC")->limit(50)->get();

        }
        $patients0 = DB::table('patients')->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("users",'users.id',"=","patients.rejected_by")->
        whereNotNull("rejected_by")->select('id_patient',"nom","prenom")->get();
        return view('patients.rejected',['user' => $user,"patients"=>$patients,"patients0"=>$patients0]);
        
    }
    public function calc_age($now, $birthday){
        $date = new DateTime($birthday);
        $now = new DateTime("31-12-".$now);
        $interval = $now->diff($date);
        return $interval->y;
    }
    public function stats($annee="")
    {   
        $user = Auth::user();
        if($annee =="all" || $annee ==""){
            $patients100 = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->whereNotNull("confirmed_by")->
            whereNull("rejected_by")->whereNull("desisted_by")->whereNull("desistement")->
            where("taux",100)->get();
        }else{
            $patients100 = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->whereNotNull("confirmed_by")->
            whereNull("rejected_by")->whereNull("desisted_by")->whereNull("desistement")->
            where("year",$annee)->where("taux",100)->get();
        }
        
        if($annee == "all" || $annee ==""){
            $now = Date('Y');
        }else{
            $now = $annee;
        }

        foreach($patients100 as $patient){
            $patient->age = $this->calc_age($now,$patient->date_naissance);
        }
        $handicaps = DB::table('handicaps')->get();
        $stats = array();
        $stats = $this->calc_stats($stats, $patients100,$handicaps);

        return view('patients.stats',['user' => $user,"stats"=>$stats,"stats_2"=>$stats,"annee"=>$annee]);
        
    }
    public function get_stats($annee="")
    {   
        $user = Auth::user();

        $handicaps = DB::table('handicaps')->get();
        if($annee =="all" || $annee ==""){
            $patients = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->whereNotNull("confirmed_by")->
            whereNull("rejected_by")->whereNull("desisted_by")->whereNull("desistement")->
            where("taux","<",100)->get();
        }else{
            $patients = DB::table('patients')->
            join("handicaps","handicaps.id_handicap","=","patients.handicap")->whereNotNull("confirmed_by")->
            whereNull("rejected_by")->whereNull("desisted_by")->whereNull("desistement")->
            where("year",$annee)->where("taux","<",100)->get();
        }

        if($annee == "all" || $annee ==""){
            $now = Date('Y');
        }else{
            $now = $annee;
        }

        foreach($patients as $patient){
            $patient->age = $this->calc_age($now,$patient->date_naissance);
        }
        $stats_2 = array();
        $stats_2 = $this->calc_stats($stats_2,$patients,$handicaps);
        $stats = new stdClass();
        $stats->tab = $stats_2;
        $stats->tot2_1 = array_sum(array_column($stats_2,"stats_0_3_m"));
        $stats->tot2_2= array_sum(array_column($stats_2,"stats_0_3_f"));
        $stats->tot2_3= array_sum(array_column($stats_2,"stats_3_5_m"));
        $stats->tot2_4= array_sum(array_column($stats_2,"stats_3_5_f"));
        $stats->tot2_5= array_sum(array_column($stats_2,"stats_5_18_m"));
        $stats->tot2_6= array_sum(array_column($stats_2,"stats_5_18_f"));
        $stats->tot2_7= array_sum(array_column($stats_2,"stats_18_35_m"));
        $stats->tot2_8= array_sum(array_column($stats_2,"stats_18_35_f"));
        $stats->tot2_9= array_sum(array_column($stats_2,"stats_35_60_m"));
        $stats->tot2_10= array_sum(array_column($stats_2,"stats_35_60_f"));
        $stats->tot2_11= array_sum(array_column($stats_2,"stats_60_m"));
        $stats->tot2_12= array_sum(array_column($stats_2,"stats_60_f"));
        $stats->tot2_13= array_sum(array_column($stats_2,"total_handicap_m"));
        $stats->tot2_14= array_sum(array_column($stats_2,"total_handicap_f"));
        $stats->tot2_15= array_sum(array_column($stats_2,"total_handicap"));
        return Response::json($stats);
        
    }

    public function calc_stats($stats,$patients,$handicaps){
        $stats = array();
        $other_stats = array();
        foreach($handicaps as $handicap){

            $total_handicap_m = 0;
            $total_handicap_f = 0;
            $stats_0_3_m = 0;
            $stats_3_5_m = 0;
            $stats_5_18_m = 0;
            $stats_18_35_m = 0;
            $stats_35_60_m = 0;
            $stats_60_m = 0;
            $stats_0_3_f = 0;
            $stats_3_5_f = 0;
            $stats_5_18_f = 0;
            $stats_18_35_f = 0;
            $stats_35_60_f = 0;
            $stats_60_f = 0;
            foreach( $patients as $patient){
                if($patient->handicap == $handicap->id_handicap){ 
                    if($patient->sexe == "ذكر"){
                        $total_handicap_m += 1;
                        if($patient->age >= 0 && $patient->age < 3){
                            $stats_0_3_m += 1;
                        }elseif($patient->age >= 3 && $patient->age < 5){
                            $stats_3_5_m += 1;
                        }elseif($patient->age >= 5 && $patient->age < 18){
                            $stats_5_18_m += 1;
                        }elseif($patient->age >= 18 && $patient->age < 35){
                            $stats_18_35_m += 1;
                        }elseif($patient->age >= 35 && $patient->age < 60){
                            $stats_35_60_m += 1;
                        }elseif($patient->age >= 60 ){
                            $stats_60_m += 1;
                        }
                    }elseif($patient->sexe == "أنثى"){
                        $total_handicap_f += 1;
                        if($patient->age >= 0 && $patient->age < 3){
                            $stats_0_3_f += 1;
                        }elseif($patient->age >= 3 && $patient->age < 5){
                            $stats_3_5_f += 1;
                        }elseif($patient->age >= 5 && $patient->age < 18){
                            $stats_5_18_f += 1;
                        }elseif($patient->age >= 18 && $patient->age < 35){
                            $stats_18_35_f += 1;
                        }elseif($patient->age >= 35 && $patient->age < 60){
                            $stats_35_60_f += 1;
                        }elseif($patient->age >= 60 ){
                            $stats_60_f += 1;
                        }
                    }
                }
            }
            $handicap->stats_0_3_m = $stats_0_3_m;
            $handicap->stats_3_5_m = $stats_3_5_m;
            $handicap->stats_5_18_m = $stats_5_18_m;
            $handicap->stats_18_35_m = $stats_18_35_m;
            $handicap->stats_35_60_m = $stats_35_60_m;
            $handicap->stats_60_m = $stats_60_m;
            $handicap->stats_0_3_f = $stats_0_3_f;
            $handicap->stats_3_5_f = $stats_3_5_f;
            $handicap->stats_5_18_f = $stats_5_18_f;
            $handicap->stats_18_35_f = $stats_18_35_f;
            $handicap->stats_35_60_f = $stats_35_60_f;
            $handicap->stats_60_f = $stats_60_f;
            $handicap->total_handicap_m = $total_handicap_m;
            $handicap->total_handicap_f = $total_handicap_f;
            $handicap->total_handicap = $total_handicap_f + $total_handicap_m;

            if($handicap->id_handicap < 5){
                array_push($stats,$handicap);
            }else{
                array_push($other_stats,$handicap);
            }
        }
        $o_s = new stdClass();
        $o_s->name_handicap = "متعدد الإعاقات";
        $o_s->stats_0_3_m = array_sum(array_column($other_stats,"stats_0_3_m"));
        $o_s->stats_0_3_f= array_sum(array_column($other_stats,"stats_0_3_f"));
        $o_s->stats_3_5_m= array_sum(array_column($other_stats,"stats_3_5_m"));
        $o_s->stats_3_5_f= array_sum(array_column($other_stats,"stats_3_5_f"));
        $o_s->stats_5_18_m= array_sum(array_column($other_stats,"stats_5_18_m"));
        $o_s->stats_5_18_f= array_sum(array_column($other_stats,"stats_5_18_f"));
        $o_s->stats_18_35_m= array_sum(array_column($other_stats,"stats_18_35_m"));
        $o_s->stats_18_35_f= array_sum(array_column($other_stats,"stats_18_35_f"));
        $o_s->stats_35_60_m= array_sum(array_column($other_stats,"stats_35_60_m"));
        $o_s->stats_35_60_f= array_sum(array_column($other_stats,"stats_35_60_f"));
        $o_s->stats_60_m= array_sum(array_column($other_stats,"stats_60_m"));
        $o_s->stats_60_f= array_sum(array_column($other_stats,"stats_60_f"));
        $o_s->total_handicap_m= array_sum(array_column($other_stats,"total_handicap_m"));
        $o_s->total_handicap_f= array_sum(array_column($other_stats,"total_handicap_f"));
        $o_s->total_handicap= array_sum(array_column($other_stats,"total_handicap"));
        array_push($stats,$o_s);
        return $stats;
    }

    public function add_patient()
    {   
        $user = Auth::user();
        $handicaps = DB::table('handicaps')->get();
        $communes = DB::table('communes')->where('code','!=','00')->orderBy('code','ASC')->get();
        return view('patients.ajouter',
        ['user' => $user,"handicaps"=>$handicaps,"communes"=>$communes]);
        
    }

    public function delete_patient($id)
    {   
        $user = Auth::user();
        $patient = DB::table('patients')->where("id_patient",$id)->delete();
        return Redirect::to('/patients');
    }

    public function edit_patient($id)
    {   
        $user = Auth::user();
        $handicaps = DB::table('handicaps')->get();
        $patient = DB::table('patients')->
        join("handicaps","handicaps.id_handicap","=","patients.handicap")->
        join("communes","communes.code","=","patients.commune")->
        where("id_patient",$id)->first();
        $communes = DB::table('communes')->where('code','!=','00')->orderBy('code','ASC')->get();
        return view('patients.modifier',['user' => $user,"handicaps"=>$handicaps,
        "patient"=>$patient,"communes"=>$communes]);
        
    }

    public function insert_patient(Request $request){
        $user = Auth::user()->id;
        $nom = $request['nom'];
        $prenom = $request['prenom'];
        $nom_fr = $request['nom_fr'];
        $prenom_fr = $request['prenom_fr'];
        $father = $request['father'];
        $mother = $request['mother'];
        $date_naissance = $request['date_naissance'];
        $lieu_naissance = $request['lieu_naissance'];
        $commune = $request['commune'];
        $adresse = $request['adresse'];
        $handicap = $request['handicap'];
        $taux = $request['taux'];
        $sexe = $request['sexe'];

        $num_card = NULL;
        $date_card = NULL;

        

        $id = DB::table('patients')->
        insertGetId(["nom"=>$nom,"prenom"=>$prenom,"nom_fr"=>$nom_fr,"prenom_fr"=>$prenom_fr,
        "date_naissance"=>$date_naissance,"lieu_naissance"=>$lieu_naissance,"handicap"=>$handicap,
        "father"=>$father,"mother"=>$mother,"sexe"=>$sexe,
        "commune"=>$commune,
        "num_card"=>$num_card,"date_card"=>$date_card,
        "inserted_at"=>Date('Y-m-d'),"year"=>Date("Y"),
        "adresse"=>$adresse,"taux"=>$taux,"user_id"=>$user]);

        if(isset($request["medical_file"]) && $request["medical_file"] != NULL){
            $file = $request['medical_file'];
            $destination0 = public_path().'\uploads\users';
            $destination = '/uploads/users/';
            $name= $destination.$id.'_'.$file->getClientOriginalName();
            $file->move($destination0,$name);
            DB::table('patients')->where('id_patient',$id)->update(
            ['medical_file'=>$name]);
        }

        return Redirect::to('/patients');
    }

    public function update_patient(Request $request){
        $patient = $request['patient'];
        $user = Auth::user()->id;
        $nom = $request['nom'];
        $prenom = $request['prenom'];
        $nom_fr = $request['nom_fr'];
        $prenom_fr = $request['prenom_fr'];
        $father = $request['father'];
        $mother = $request['mother'];
        $date_naissance = $request['date_naissance'];
        $lieu_naissance = $request['lieu_naissance'];
        $adresse = $request['adresse'];
        $commune = $request['commune'];

        $handicap = $request['handicap'];
        $taux = $request['taux'];
        $sexe = $request['sexe'];

        $num_card = NULL;
        $date_card = NULL;
        if(isset($request['num_card'])){
            $num_card = $request['num_card'];
        }
        if(isset($request['date_card'])){
            $date_card = $request['date_card'];
        }
        $id = DB::table('patients')->where('id_patient',$patient)->
        update(["nom"=>$nom,"prenom"=>$prenom,"nom_fr"=>$nom_fr,"prenom_fr"=>$prenom_fr,
        "date_naissance"=>$date_naissance,"lieu_naissance"=>$lieu_naissance,"handicap"=>$handicap,
        "father"=>$father,"mother"=>$mother,"sexe"=>$sexe,"commune"=>$commune,
        "num_card"=>$num_card,"date_card"=>$date_card,
        "adresse"=>$adresse,"taux"=>$taux]);

        if(isset($request["medical_file"]) && $request["medical_file"] != NULL){
            $file = $request['medical_file'];
            $destination0 = public_path().'\uploads\users';
            $destination = '/uploads/users/';
            $name= $destination.$id.'_'.$file->getClientOriginalName();
            $file->move($destination0,$name);
            DB::table('patients')->where('id_patient',$patient)->update(
            ['medical_file'=>$name]);
        }
        if(Auth::user()->service =="Chef"){
            return Redirect::to('/validated_patients');
        }
        return Redirect::to('/patients');
    }

    public function confirm_patient(Request $request){
        $patient = $request['patient'];
        $user = Auth::user()->id;
        $nom = $request['nom'];
        $prenom = $request['prenom'];
        $nom_fr = $request['nom_fr'];
        $prenom_fr = $request['prenom_fr'];
        $father = $request['father'];
        $mother = $request['mother'];
        $date_naissance = $request['date_naissance'];
        $lieu_naissance = $request['lieu_naissance'];
        $adresse = $request['adresse'];
        $commune = $request['commune'];

        $handicap = $request['handicap'];
        $taux = $request['taux'];
        $sexe = $request['sexe'];

        $num_card = $request['num_card'];
        $last = strval($num_card);

        if(strlen($last) == 1){
            $last = "000".$last;
        }elseif(strlen($last) == 2){
            $last = "00".$last;
        }elseif(strlen($last) == 3){
            $last = "0".$last;
        }
        $num_card = $last;
        $date_card = $request['date_card'];

        $accepted = $request['accepted'];
        $confirmed_by = NULL;
        $rejected_by = NULL;
        
        if($accepted =="accept"){
            $confirmed_by = $user;
        }else{
            $rejected_by = $user;
        }

        $id = DB::table('patients')->where('id_patient',$patient)->
        update(["nom"=>$nom,"prenom"=>$prenom,"nom_fr"=>$nom_fr,"prenom_fr"=>$prenom_fr,
        "date_naissance"=>$date_naissance,"lieu_naissance"=>$lieu_naissance,"handicap"=>$handicap,
        "father"=>$father,"mother"=>$mother,"sexe"=>$sexe,"commune"=>$commune,
        "num_card"=>$num_card,"date_card"=>$date_card,
        "confirmed_by"=>$confirmed_by,"rejected_by"=>$rejected_by,
        "adresse"=>$adresse,"taux"=>$taux]);

        if(isset($request["medical_file"]) && $request["medical_file"] != NULL){
            $file = $request['medical_file'];
            $destination0 = public_path().'\uploads\users';
            $destination = '/uploads/users/';
            $name= $destination.$id.'_'.$file->getClientOriginalName();
            $file->move($destination0,$name);
            DB::table('patients')->where('id_patient',$patient)->update(
            ['medical_file'=>$name]);
        }
        if($accepted =="accept"){
            return Redirect::to('/validated_patients');
        }else{
            return Redirect::to('/rejected_patients');
        }
        
    }

}
