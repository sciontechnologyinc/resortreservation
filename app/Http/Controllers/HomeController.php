<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companyinformation;
class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyinformations = Companyinformation::where('user_id','>' ,'1')->orderBy('id')->get();
        return view('website.pages.resorts', ['companyinformations' => $companyinformations]);
    }
}
