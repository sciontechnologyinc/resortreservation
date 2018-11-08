<?php

namespace App\Http\Controllers;
use App\Massagetypes;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MassagetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $massagetypes = Massagetypes::orderBy('id')->get();
        return view('massagetypes.massagetypes', ['massagetypes' => $massagetypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('massagetypes.addmassagetype');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $massagetypes = $request->all();
        $data = $request->validate([
           'massagetypename' => 'required',
           'massagetypedescription' => 'required',
           'price' => 'required'
           
       ]);
       Massagetypes::create($data);
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
        $massagetype = Massagetypes::find($id);
        return view('massagetypes.editmassagetype', ['massagetype' => $massagetype]);
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
        $massagetype = Massagetypes::find($id);
        $data = $request->all();
        $massagetype->update($data);


        return redirect('/massagetypes')->with('success','Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $massagetypes = Massagetypes::find($id);
	    $massagetypes->destroy($id);


	    return redirect()->back()->with('success','Deleted successfuly');
    }
}
