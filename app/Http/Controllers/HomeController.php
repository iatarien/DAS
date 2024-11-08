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

    public function index()
    {   
        return Redirect::to('/patients');
    }
   
    public function ajouter(){
        $user = Auth::user();
        return view('handicaps.ajouter',['user'=>$user]);
    }

    public function modifier($id){
        $user = Auth::user();
        $handicap = DB::table("handicaps")->where('id_handicap',$id)->first();

        return view('handicaps.ajouter',['user'=>$user]);
    }


    public function add_handicap(Request $request){

        $name_handicap = $request['name_handicap'];
        $acronym = $request['acronym'];
        $threshold = $request['threshold'];

        $id = DB::table('handicap')->
        insertGetId(["name_handicap"=>$name_handicap,"acronym"=>$acronym,
        "threshold"=>$threshold]);
        return Redirect::to('/handicaps');
    }

    public function update_handicap(Request $request){

        $id = $request['id'];

        $name_handicap = $request['name_handicap'];
        $acronym = $request['acronym'];
        $threshold = $request['threshold'];
        
        DB::table('handicap')->where("id_handicap",$id)->
        update(["name_handicap"=>$name_handicap,"acronym"=>$acronym,
        "threshold"=>$threshold]);

        return Redirect::to('/handicaps');
    }
    
}
