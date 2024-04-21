<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB;
use Auth;
use Bcrypt;
use Redirect;
use DateTime;
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
        $patients = DB::table('patients')->join("handicaps","handicaps.id_handicap","=","patients.handicap")->get();

        return view('patients.patients',['user' => $user,"patients"=>$patients]);
        
    }
    public function calc_age($birthday){
        $date = new DateTime($birthday);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }
    public function stats($filters="")
    {   
        $user = Auth::user();
        $patients = DB::table('patients')->join("handicaps","handicaps.id_handicap","=","patients.handicap")->get();
        foreach($patients as $patient){
            $patient->age = $this->calc_age($patient->date_naissance);
        }
        $handicaps = DB::table('handicaps')->get();
        return view('patients.stats',['user' => $user,"patients"=>$patients,"handicaps"=>$handicaps]);
        
    }
    public function add_patient()
    {   
        $user = Auth::user();
        $handicaps = DB::table('handicaps')->get();
        return view('patients.ajouter',['user' => $user,"handicaps"=>$handicaps]);
        
    }

    public function edit_patient($id)
    {   
        $user = Auth::user();
        $handicaps = DB::table('handicaps')->get();
        $patient = DB::table('patients')->join("handicaps","handicaps.id_handicap","=","patients.handicap")->where("id_patient",$id)->first();
        return view('patients.modifier',['user' => $user,"handicaps"=>$handicaps,"patient"=>$patient]);
        
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
        $adresse = $request['adresse'];
        $handicap = $request['handicap'];
        $taux = $request['taux'];
        $sexe = $request['sexe'];

        $num_card = $request['num_card'];
        $date_card = $request['date_card'];

        $id = DB::table('patients')->
        insertGetId(["nom"=>$nom,"prenom"=>$prenom,"nom_fr"=>$nom_fr,"prenom_fr"=>$prenom_fr,
        "date_naissance"=>$date_naissance,"lieu_naissance"=>$lieu_naissance,"handicap"=>$handicap,
        "father"=>$father,"mother"=>$mother,"sexe"=>$sexe,
        "num_card"=>$num_card,"date_card"=>$date_card,
        "inserted_at"=>Date('Y-m-d'),"year"=>Date("Y"),
        "adresse"=>$adresse,"taux"=>$taux,"user_id"=>$user]);

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
        $handicap = $request['handicap'];
        $taux = $request['taux'];
        $sexe = $request['sexe'];

        $num_card = $request['num_card'];
        $date_card = $request['date_card'];

        $id = DB::table('patients')->where('id_patient',$patient)->
        update(["nom"=>$nom,"prenom"=>$prenom,"nom_fr"=>$nom_fr,"prenom_fr"=>$prenom_fr,
        "date_naissance"=>$date_naissance,"lieu_naissance"=>$lieu_naissance,"handicap"=>$handicap,
        "father"=>$father,"mother"=>$mother,"sexe"=>$sexe,
        "num_card"=>$num_card,"date_card"=>$date_card,
        "adresse"=>$adresse,"taux"=>$taux]);

        return Redirect::to('/patients');
    }

}
