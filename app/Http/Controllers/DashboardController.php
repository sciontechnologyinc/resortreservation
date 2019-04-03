<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmassage;
use App\User;
use App\Staffs;
use Carbon\Carbon;
use DB;
use Auth;

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
        if(Auth::user()->admin == '2')
        {
            $amount =Bookmassage::select('amount')->where('status','Paid')->sum('amount');
            $reports = Bookmassage::orderBy('id')->get();
            $users = User::count();
            $staff = Staffs::count();
            $report = Bookmassage::count();
            
        }
        else
        {
            $amount =Bookmassage::select('amount')->where('status','Paid')->where('user_id',Auth::user()->id)->sum('amount');
            $reports = Bookmassage::orderBy('id')->where('user_id',Auth::user()->id)->get();
            $users = User::where('id',Auth::user()->id)->count();
            $staff = Staffs::where('id',Auth::user()->id)->count();
            $report = Bookmassage::where('id',Auth::user()->id)->count();
        }
        return view('dashboard.index', compact('reports','users','staff','report','amount'));


        
    }

    /**
     *  get the sub month of the given integer
     */
    private function getPrevDate($num){
        return Carbon::now()->subMonths($num)->toDateTimeString();
    }
}
