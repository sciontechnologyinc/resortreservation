<?php

namespace App\Http\Controllers;

use App\Companyinformation;
use Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyinformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Companyinformation::where('user_id', '=', Auth::user()->id)->exists()) {
            $companyinformations = Companyinformation::where('user_id', Auth::user()->id)->get();
            return view('companyinformation.companyinformation')->with('companyinformations', $companyinformations);
        }else{
            $companyinformations = Companyinformation::where('user_id', '0')->get();
            return view('companyinformation.companyinformation')->with('companyinformations', $companyinformations);;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companyinformation.companyinformation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $companyinformation = $request->all();
        $data = $request->validate([
           'companyname' => 'required',
           'mission' => 'required',
           'vision' => 'required',
           'contactno' => 'required',
           'address' => 'required',
           'email' => 'required',
           'footerinformation' => 'required',
           'photo' => 'image|nullable'
       ]);
       if($request->hasFile('photo')){
            
        $filenameWithExt = $request->file('photo')->getClientOriginalName();

        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        $extension = $request->file('photo')->getClientOriginalExtension();

        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        
        $path = $request->file('photo')->storeAs('public/uploads', $fileNameToStore);
    }else{
        $fileNameToStore = 'default_logo.png';
    }

        if (Companyinformation::where('user_id', '=', $request->input('user_id'))->exists()) {
            $companyinformation = Companyinformation::where('user_id', $id)->firstOrFail();
            $companyinformation->companyname = $request->input('companyname');
            $companyinformation->mission = $request->input('mission');
            $companyinformation->vision = $request->input('vision');
            $companyinformation->contactno = $request->input('contactno');
            $companyinformation->address = $request->input('address');
            $companyinformation->email = $request->input('email');
            $companyinformation->footerinformation = $request->input('footerinformation');
            $companyinformation->photo = $fileNameToStore;
            $companyinformation->save();
            return redirect()->back()->with('success','Added successfuly');
         }else{
            $companyinformation = new Companyinformation;
            $companyinformation->user_id = $request->input('user_id');
            $companyinformation->companyname = $request->input('companyname');
            $companyinformation->mission = $request->input('mission');
            $companyinformation->vision = $request->input('vision');
            $companyinformation->contactno = $request->input('contactno');
            $companyinformation->address = $request->input('address');
            $companyinformation->email = $request->input('email');
            $companyinformation->footerinformation = $request->input('footerinformation');
            $companyinformation->photo = $fileNameToStore;
            $companyinformation->save();
    
             return redirect()->back()->with('success','Added successfuly');
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
