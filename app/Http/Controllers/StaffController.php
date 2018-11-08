<?php

namespace App\Http\Controllers;

use App\Staffs;

use Carbon\Carbon;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use function Psy\debug;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staffs::orderBy('id')->get();
        return view('staffs.staffs', ['staffs' => $staffs]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staffs.addstaff');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staffs = $request->all();
        $data = $request->validate([
           'staffid' => 'required',
           'staffname' => 'required',
           'contactno' => 'required',
           'type' => 'required'
           
       ]);
       Staffs::create($data);
       return redirect()->back()->with('success','Added successfuly');
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
        $staff = Staffs::find($id);
        return view('staffs.editstaff', ['staff' => $staff]);
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
        $staff = Staffs::find($id);
        $data = $request->all();
        $staff->update($data);


        return redirect('/staffs')->with('success','Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staffs = Staffs::find($id);
	    $staffs->destroy($id);


	    return redirect()->back()->with('success','Deleted successfuly');
    }
}
