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

    public function close(){
        return view('close');
    }
}
