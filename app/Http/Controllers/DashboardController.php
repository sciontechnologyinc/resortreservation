<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmassage;
use App\User;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    /**
     *  Only authenticated users can access this controller
     */
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Show Dashboard View
     *
     * @return View
     */
    public function index(){
        
        $reports = Bookmassage::orderBy('id')->get();
        return view('dashboard.index', ['reports' => $reports]);
    }

    /**
     *  get the sub month of the given integer
     */
    private function getPrevDate($num){
        return Carbon::now()->subMonths($num)->toDateTimeString();
    }
}
