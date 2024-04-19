<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB;
use Auth;
use Bcrypt;
use Redirect;
class HomeController extends Controller
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

    public function get_projects($secteur,$filters=""){
        if($filters != ""){
            $filters = explode("*1989*",$filters);
            $sous_secteur = $filters[0];
            $source = $filters[1];

            if($secteur !="all"){
                $query = "SELECT * FROM projet WHERE secteur = '".$secteur."' AND";
            }else{
                $query = "SELECT * FROM projet WHERE ";
            }
            
            if ($sous_secteur != ""){
                $query = $query." sous_secteur ='".$sous_secteur."' AND"; 
            }
            if($source != ""){
                $query = $query." source ='".$source."' AND";
            }
            // if($numero !=""){
            //     $query = $query." numero = '".$numero."' AND";
            // }
            $query= $query." numero !='N?' AND date_cloture IS NULL ";
            // if($order != ""){
            //     $query = $query." ORDER BY ".$order; 
            // }
            //echo $query;
            return DB::select( DB::raw($query));
        }else{
            if($secteur !="all"){
                return DB::table('projet')->where('secteur',$secteur)->whereNull("date_cloture")->orderby("id","DESC")->get();
            }else{
                return DB::table('projet')->whereNull("date_cloture")->orderby("id","DESC")->get();
            }
                       
        }
    }

    public function index($secteur="all")
    {   

        $user = Auth::user();
        return view('index',['user' => $user]);
        $user = Auth::user();
        if($secteur =="all"){
            $ops = DB::table('projet')->whereNull("date_cloture")->get();
            $programmes = DB::table("programme")->whereNull("parent")->get();
        }else{
            $ops = DB::table('projet')->where("secteur",$secteur)->
            whereNull("date_cloture")->get();
            $programmes = DB::table("programme")->where("secteur",$secteur)->
            whereNull("parent")->get();
        }
        $secteurs = DB::table('secteur')->get();
        return view('projet.projet',['user' => $user,"ops"=>$ops,
        "porte"=>$secteur,"secteurs"=>$secteurs,
        "programmes"=>$programmes
        ]);
        
    }
   
    public function ajouter(){
        $user = Auth::user();
        $secteurs= DB::table('secteur')->get();
        return view('projet.ajouter_operation',
        ['user'=>$user,"secteurs"=>$secteurs]);
    }


    public function add_op(Request $request){
        $user = Auth::user()->id;
        $secteur = $request['secteur'];
        $programme = $request['programme'];
        $sous_programme = $request['sous_id'];
        $annee = $request['annee'];
        $numero = $request['numero'];
        $intitule = $request['intitule'];
        $intitule = $request['intitule'];
        $date = $request['date'];
        $source = $request['source'];

        $AP_init = floatval($request['AP_init']);
        $reevaluation = 0;
        $AP_act = $AP_init;
        $taux = 0;
        $observations = "";        
        $num_cloture = NULL;
        $date_cloture = NULL;
        $id = DB::table('projet')->
        insertGetId(["secteur"=>$secteur,"programme"=>$programme,
        "sous_programme"=>$sous_programme,'numero'=>$numero,'intitule'=>$intitule,
        'intitule'=>$intitule,'date'=>$date,'source'=>$source,'annee'=>$annee,
        'AP_init'=>$AP_init,'reevaluation'=>$reevaluation,'AP_act'=>$AP_act,
        'taux'=>$taux,"observations"=>$observations,'num_cloture'=>$num_cloture,
        'date_cloture'=>$date_cloture,"user_id"=>$user]);
        return Redirect::to('/projet/all');
    }

    public function update_op(Request $request){
        $user = Auth::user();
        $id = $request['id_op'];
        if($user->service =="Comptabilité"){
            $secteur = $request['secteur'];
            $programme = $request['programme'];
            $sous_programme = $request['sous_id'];
            $annee = $request['annee'];
            $numero = $request['numero'];
            $intitule = $request['intitule'];
            $intitule = $request['intitule'];
            $date = $request['date'];
            $source = $request['source'];
            $AP_init = floatval($request['AP_init']);
            $reevaluation = floatval($request['reevaluation']);
            $AP_act = floatval($AP_init) + $reevaluation;
            $taux = $request['taux'];
            $observations = $request['observations'];        
            $num_cloture = $request['num_cloture'];
            $date_cloture = $request['date_cloture'];
            DB::table('projet')->where('id',$id)->
            update(["secteur"=>$secteur,"programme"=>$programme,
            "sous_programme"=>$sous_programme,'numero'=>$numero,'intitule'=>$intitule,
            'intitule'=>$intitule,'date'=>$date,'source'=>$source,'annee'=>$annee,
            'AP_init'=>$AP_init,'reevaluation'=>$reevaluation,'AP_act'=>$AP_act,
            'taux'=>$taux,"observations"=>$observations,'num_cloture'=>$num_cloture,
            'date_cloture'=>$date_cloture]);
        }elseif($user->service =="Suivi"){
            
            $taux = $request['taux'];
            $observations = $request['observations'];   
            DB::table('projet')->where('id',$id)->
            update(['taux'=>$taux,"observations"=>$observations]);
        }elseif($user->service =="Cloture"){
            $num_cloture = $request['num_cloture'];
            $date_cloture = $request['date_cloture'];     

            DB::table('projet')->where('id',$id)->
            update(['num_cloture'=>$num_cloture,'date_cloture'=>$date_cloture]);

        }
 
        return Redirect::to('/projet/all');
    }
    
}
