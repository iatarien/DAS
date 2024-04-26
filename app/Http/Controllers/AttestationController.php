<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB;
use Auth;
use Bcrypt;
use Redirect;

class AttestationController extends Controller
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
     
    public function fiche($id,$type)
    {   
        $user = Auth::user();
        $patient = DB::table('patients')->join("handicaps","handicaps.id_handicap","=","patients.handicap")->where("id_patient",$id)->first();
        $view = 'attestations.fiche';
        if($type=="card"){
            $view = 'attestations.card';
        }elseif($type=="card2"){
            $view = 'attestations.card2';
        }
        return view($view,['user'=> $user,"patient"=>$patient,"type"=>$type]);

    }
    public function get_last()
    {   
        $user = Auth::user();
        $year = Date('Y');
        $last = DB::table('patients')->whereNotNull("confirmed_by")->
        where("year",$year)->orderBy("num_card","DESC")->first();
        if($last == NULL || $last ==""){
            $last = "0001";
        }else{
            $last = $last->num_card;
            $last = intval($last) + 1;
            $last = strval($last);
   
            if(strlen($last) == 1){
                $last = "000".$last;
            }elseif(strlen($last) == 2){
                $last = "00".$last;
            }elseif(strlen($last) == 3){
                $last = "0".$last;
            }
        }
        return $last;

    }
    public function close(){
        return view('close');
    }
}
