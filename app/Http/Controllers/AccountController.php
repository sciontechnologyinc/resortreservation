<?php

namespace App\Http\Controllers;
use App\User;
use App\Companyinformation;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = User::orderBy('id')->get();
        return view('accounts.account', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'contactno' => $data['contactno'],
            'admin' => $data['admin'],
            'password' => Hash::make($data['password']),
       ]);

            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->admin = $request->input('admin');
            $user->contactno = $request->input('contactno');
            $user->password = $request->input('password');

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
        $account = User::find($id);
        return view('accounts.editaccount', ['account' => $account]);
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
        $account = User::find($id);
        $data = $request->all();
        $account->update($data);


        return redirect('/accounts')->with('success','Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accounts = User::find($id);
	    $accounts->destroy($id);


	    return redirect()->back()->with('success','Deleted successfuly');
    }
}
