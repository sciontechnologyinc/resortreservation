<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Companyinformation;
use App\Gallery;
use App\User;
use App\Schedule;
use App\Packages;
use Auth;
use App\Bookmassage;
class DynamicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyinformations = Companyinformation::where('user_id','>' ,'1')->orderBy('id')->get();
        return view('website.pages.resorts', ['companyinformations' => $companyinformations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    
    public function aboutus($id)
    {
        $companyinformation = Companyinformation::where("user_id",$id)->orderBy('id')->get();
        $schedules = Schedule::where('users_id',$id)->get();
        return view('website.pages.aboutus', compact('companyinformation','schedules'));
    }
    public function services($id)
    {
        $companyinformation = Companyinformation::where("user_id",$id)->orderBy('id')->get();
        $packages = Packages::where("user_id",$id)->orderBy('id')->get();
        return view('website.pages.services', ['packages' => $packages, 'companyinformation' => $companyinformation]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companyinformation = Companyinformation::where("user_id",$id)->orderBy('id')->get();
        $galleries = Gallery::where("user_id",$id)->orderBy('id')->get();
        return view('website.pages.home', compact('companyinformation'), compact('galleries'));
    }

    public function adminlogo($id)
    {
        $companyinformation = Companyinformation::where("user_id",$id)->orderBy('id')->get();
        return response()->json(['companyinformation' => $companyinformation]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function notification()
    {
            $notification = User::where('notification','0')->get();
            $number = User::where('notification', '0')->count();
            $reservednumber = Bookmassage::where('notification', '0')->where('user_id',Auth::user()->id)->count();
            $reservation = Bookmassage::where("notification",'0')->orderBy('created_at')->get();

            return response()->json(['success' => true, 'notification' => $notification, 'reservation' => $reservation,'number' => $number,'reservednumber' => $reservednumber]);
    }
    
    public function notificationupdate()
    {
        $notification = User::where('notification', '0')->update(request()->all());
        $reservation = Bookmassage::where('notification', '0')->where('user_id',Auth::user()->id)->update(request()->all());
    }
}