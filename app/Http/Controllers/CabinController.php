<?php

namespace App\Http\Controllers;
use App\Cabins;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CabinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabins = Cabins::orderBy('id')->get();
        return view('cabins.cabins', ['cabins' => $cabins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cabins.addcabin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cabins = $request->all();
        $data = $request->validate([
           'cabinno' => 'required',
           'cabinname' => 'required',
           'cabindescription' => 'required'
           
       ]);
       Cabins::create($data);
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
        $cabin = Cabins::find($id);
        return view('cabins.editcabin', ['cabin' => $cabin]);
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
        $cabin = Cabins::find($id);
        $data = $request->all();
        $cabin->update($data);


        return redirect('/cabins')->with('success','Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cabins = Cabins::find($id);
	    $cabins->destroy($id);


	    return redirect()->back()->with('success','Deleted successfuly');
    }
}
