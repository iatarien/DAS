<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB;
use Auth;
use Bcrypt;
use Redirect;

class RapportController extends Controller
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

     
    public function show_rapports($filters="")
    {   
        $user = Auth::user();
        $rapports = DB::table('rapport')->join("activity","activity.id_activity","=","rapport.activite")->
        leftjoin("users","rapport.engineer","users.id")->
        join("niveau","activity.niveau","=","niveau.id_niveau")->
        join("module","module.id_module","activity.module")->
        join("labos","labos.id_labo","rapport.labo")->
        orderBy("date","ASC")->orderBy("time","ASC")->get();
        foreach($rapports as $rapport){
            $outils = DB::table("outils")->join("tools","tools.id_tool","=","outils.id_outil")->where("outils.id_rapport",$rapport->id_rapport)->get();
            $chemicals = DB::table("chemicals")->join("chemical","chemicals.id_chemical","=","chemical.id_chemical")->where("chemicals.id_rapport",$rapport->id_rapport)->get();
            $n = count($outils);
            $m = count($chemicals);
            if($n == 0){
                $n = 1;
            }
            $rapport->outils = $outils;
            $rapport->chemicals = $chemicals;
            $rapport->n = $n;
            $rapport->m = $m;
        }
        return view('rapport.rapports',['user' => $user,"rapports"=>$rapports]);
        
    }
     
    public function add_rapport()
    {   
        $user = Auth::user();
        $engineers = DB::table('users')->where('service',"Ingenieur")->get();
        $labos = DB::table('labos')->get();
        return view('rapport.ajouter1',['user' => $user,"labos"=>$labos]);
        
    }
    public function add_rapport_2($id)
    {   
        $user = Auth::user();
        $rapport = DB::table('rapport')->where('id_rapport',$id)->first();
        $niveaux = DB::table('niveau')->get();
        $modules = DB::table('module')->get();
        return view('rapport.ajouter2',['user' => $user,"rapport"=>$rapport,
        "niveaux"=>$niveaux,"modules"=>$modules]);
        
    }
    public function add_outils($id)
    {   
        $user = Auth::user();
        $rapport = DB::table('rapport')->where('id_rapport',$id)->first();
        $devices = DB::table('tools')->where("type","جهاز")->get();
        $matieres = DB::table('tools')->where("type","مادة")->get();
        $chemicals = DB::table('chemical')->get();
        return view('rapport.ajouter_outils',['user' => $user,"rapport"=>$rapport,
        "devices"=>$devices,"matieres"=>$matieres,"chemicals"=>$chemicals]);
        
    }
    public function insert_rapport(Request $request){
        $user = Auth::user()->id;
        $date = $request['date'];
        $time = $request['time'];
        $labo = $request['labo'];
        $activite = $request['activite'];
        $ze_activity = $request['activite'];
        $engineer = $request['engineer'];

        $id = DB::table('rapport')->
        insertGetId(["date"=>$date,"time"=>$time,"labo"=>$labo,"activite"=>$activite,"ze_activity"=>$ze_activity,
        "engineer"=>$engineer,"user_id"=>$user]);
        return Redirect::to('/add_rapport_2/'.$id);
    }
    public function insert_activity(Request $request){
        $user = Auth::user()->id;
        $id_rapport = $request['id_rapport'];
        $type_activity = $request['activite'];
        $niveau = $request['niveau'];
        $module = $request['module'];
        $sujet_trav = $request['sujet_trav'];

        $id = DB::table('activity')->
        insertGetId(["type_activity"=>$type_activity,
        "niveau"=>$niveau,"module"=>$module,"sujet_trav"=>$sujet_trav]);
        DB::table('rapport')->where("id_rapport",$id_rapport)->update(["activite"=>$id]);


        return Redirect::to('/add_outils/'.$id_rapport);
    }

    public function insert_outils(Request $request){

        $devices = $request['devices'];
        if($devices != "" && $devices != NULL){
            foreach($devices as $device){
                $id = DB::table('outils')->
                insertGetId(["id_rapport"=>$device[6],"id_outil"=>$device[0],"type_outil"=>$device[1],
                "charge"=>$device[2],"state_av"=>$device[3],"avis"=>$device[4],"state_after"=>$device[5]]);
            }
        }
        
        return "success";
    }   

    public function insert_chemicals(Request $request){

        $devices = $request['devices'];
        if($devices != "" && $devices != NULL){
            foreach($devices as $device){
                DB::table("chemical")->where("id_chemical",$device[0])->decrement("quantity",$device[1]);
                $quantity_now = DB::table("chemical")->where("id_chemical",$device[0])->first()->quantity;
                $id = DB::table('chemicals')->
                insertGetId(["id_rapport"=>$device[2],"id_chemical"=>$device[0],"qty"=>$device[1],"quantity_now"=>$quantity_now]);
            }
        }
        return "success";
    }  
}
