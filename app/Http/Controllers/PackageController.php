<?php

namespace App\Http\Controllers;
use App\Bookmassage;
use App\Packages;
use App\Schedule;
use App\Companyinformation;
use Calendar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Packages::where('user_id',Auth::user()->id)->orderBy('id')->get();
        return view('packages.packages', ['packages' => $packages]);
    }

    public function services()
    {
        $packages = Packages::orderBy('id')->get();
        return view('website.pages.services', ['packages' => $packages]);
        
    }


    public function packagesdropdown($id)
    {
        $events = Bookmassage::orWhere('user_id',$id)->where('status','Paid')->get();
        $schedules = Schedule::where('users_id',$id)->get();
        $operation = [];
        if($schedules[0]->monday != 'on'){
            array_push($operation,1);
        }if($schedules[0]->tuesday != 'on'){
            array_push($operation,2);
        }if($schedules[0]->wednesday != 'on'){
            array_push($operation,3);
        }if($schedules[0]->thursday != 'on'){
            array_push($operation,4);
        }if($schedules[0]->friday != 'on'){
            array_push($operation,5);
        }if($schedules[0]->saturday != 'on'){
            array_push($operation,6);
        }if($schedules[0]->sunday != 'on'){
            array_push($operation,0);
        }
        
        $event_list = [];
        foreach($events as $key => $event) {
            $date = date_format(date_create($event->start_date),"Y/m/d H:i:s");
            $end_date = date_format(date_create($event->end_date),"Y/m/d H:i:s");
            $event_list[] = Calendar::event(
                'Reserved',
                false,
                $date,
                $end_date
            );
        }
        $bookmassages = Calendar::addEvents($event_list);
        $bookmassages->setOptions([
            "defaultView" => 'month',
            "allDaySlot" => false,
            "selectable" => true,
            "height"=> "auto",
            // "minTime" =>  "10:00:00",
            // "maxTime" => "18:00:00",
            "hiddenDays" => $operation,
            "header"=> [
                "right"=> 'prevYear,prev,next,nextYear',
                "left"=> 'month,agendaWeek,today',
                "center"=> 'title'
            ]
        ])
        ->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
            "dayClick" => "function(date, jsEvent, view) {
                $('#reserve').modal('show'); 
                $('[name=from]').val(date.format('YYYY-MM-DD'));
                $('[name=to]').val(date.format('YYYY-MM-DD'));
            }"
        ]);
        $packages = Packages::where('user_id',$id)->orderBy('id')->get();
        $companyinformation = Companyinformation::where('user_id',$id)->orderBy('id')->get();
        $paypalamount = Bookmassage::latest()->limit(1)->get();   

        return view('bookmassages/create', ['bookmassages' => $bookmassages, 'packages' => $packages , 'companyinformation' => $companyinformation, 'paypalamount' => $paypalamount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('packages.addpackage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = $request->all();
        $data = $request->validate([
           'packagecode' => ['required', 'max:255', 'unique:packages'],
           'packagedescription' => ['required', 'unique:packages'],
           'price' => 'required',
           'photo' => ['required', 'unique:packages','image','nullable','max:1999'],
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
    
        $package = new Packages;
        $package->packagecode = $request->input('packagecode');
        $package->packagedescription = $request->input('packagedescription');
        $package->price = $request->input('price');
        $package->photo = $fileNameToStore;
        $package->user_id = Auth::user()->id;
        $package->save();

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
        $package = Packages::find($id);
        return view('packages.editpackage', ['package' => $package]);
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
        $package = Packages::find($id);
        $data = $request->all();
        $package->update($data);


        return redirect('/packages')->with('success','Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $packages = Packages::find($id);
	    $packages->destroy($id);


	    return redirect()->back()->with('success','Deleted successfuly');
    }

    public function description($id)
    {
        $codepackages = Packages::where('packagecode',$id)->get();
        return response()->json(['codepackages' => $codepackages]);
    }
}
