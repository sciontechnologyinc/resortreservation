<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use Auth;
class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $schedules = Schedule::where('users_id',Auth::user()->id)->get();
       return view('admin.pages.schedule',compact('schedules'));
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
        $schedules = $request->all();
        $data = $request->validate([
           'users_id' => 'required',
           'monday' => 'nullable',
           'day_mon_timein' => 'required',
           'day_mon_timeout' => 'required',
           'night_mon_timein' => 'required',
           'night_mon_timeout' => 'required',
           'tuesday' => 'nullable',
           'day_tues_timein' => 'required',
           'day_tues_timeout' => 'required',
           'night_tues_timein' => 'required',
           'night_tues_timeout' => 'required',
           'wednesday' => 'nullable',
           'day_wed_timein' => 'required',
           'day_wed_timeout' => 'required',
           'night_wed_timein' => 'required',
           'night_wed_timeout' => 'required',
           'thursday' => 'nullable',
           'day_thurs_timein' => 'required',
           'day_thurs_timeout' => 'required',
           'night_thurs_timein' => 'required',
           'night_thurs_timeout' => 'required',
           'friday' => 'nullable',
           'day_fri_timein' => 'required',
           'day_fri_timeout' => 'required',
           'night_fri_timein' => 'required',
           'night_fri_timeout' => 'required',
           'saturday' => 'nullable',
           'day_sat_timein' => 'required',
           'day_sat_timeout' => 'required',
           'night_sat_timein' => 'required',
           'night_sat_timeout' => 'required',
           'sunday' => 'nullable',
           'day_sun_timein' => 'required',
           'day_sun_timeout' => 'required',
           'night_sun_timein' => 'required',
           'night_sun_timeout' => 'required',
       ]);
       if(Schedule::where('users_id', '=', $request->users_id)->exists()){
            $schedules = Schedule::where('users_id', $request->users_id)->update(request()->except('_token'));
            return redirect()->back()->with('success','Update Schedule Successfuly');
       }else{
            Schedule::create($data);
            return redirect()->back()->with('success','Added Successfuly');
       }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
