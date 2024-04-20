<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;
use DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $bloc;

    
    
    public function __construct() 
    {
        $settings = DB::table('company')->where('id_comp',1)->first();
        $this->ville = $settings->ville;
        $this->ville_fr = $settings->ville_fr;
        $this->ministere_fr = $settings->ministere_fr;
        $this->ministere = $settings->ministere;
        $this->direction = $settings->direction;
        $this->direction_fr = $settings->direction_fr;
        $this->year = Date('Y');

        View::share('ville', $this->ville);
        View::share('ville_fr', $this->ville_fr);
        View::share('direction', $this->direction);
        View::share('direction_fr', $this->direction_fr);
        View::share('ministere', $this->ministere);
        View::share('ministere_fr', $this->ministere_fr);
        View::share('the_year', $this->year);


    }
}
