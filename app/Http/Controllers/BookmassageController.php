<?php

namespace App\Http\Controllers;

use App\Bookmassage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use function Psy\debug;
use App\Packages;
use Calendar;
use Nexmo;

class BookmassageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Packages::join('bookmassages', 'bookmassages.package', '=', 'packages.packagecode')
            ->where('bookmassages.user_id',Auth::user()->id)->get();
        $event_list = [];
        foreach($events as $key => $event) {
            $event_list[] = Calendar::event(
                $event->code,
                false,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date),
                $event->id,
                [
                    'bid'=>$event->id,
                    'code'=>$event->code,
                    'contactno'=> $event->contactno,
                    'amount'=> $event->amount,
                    'start_date'=> $event->start_date,
                    'end_date' => $event->end_date,
                    'daytime' => $event->daytime,
                    'nighttime' => $event->nighttime,
                    'package' => $event->package,
                    'status' => $event->status,
                ]
            );
        }
        $bookmassages = Calendar::addEvents($event_list);
        $bookmassages->setOptions([
            "defaultView" => 'month',
            "allDaySlot" => false,
            "nowIndicator" => true,
            "selectable" => true,
            "height"=> "auto",
            // "minTime" =>  "10:00:00",
            // "maxTime" => "18:00:00",
            "hiddenDays" => [3],
            "header"=> [
                "right"=> 'prevYear,prev,next,nextYear',
                "left"=> 'month,agendaWeek,today',
                "center"=> 'title'
            ],
            "businessHours" => [
                "dow" => [ 1, 2, 3, 4, 5],
                "start" => '10:00',
                "end" => '18:00',
            ]
        ])
        ->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
            "eventRender" => "function(event, element) {
                $(element).addClass(event.status);
                $(element).popover({
                    placement : 'top',
                    html : true,
                    trigger : 'hover',
                    content : '<span><b>Code: </b>' + event.code + '</span><br />' + '<span><b>Price: </b>' + event.amount + '</span><br />' + '<span><b>Status: </b>' + event.status + '</span>'
                });
             }",
             "eventClick" => "function(event) {
                $('#editreserve').modal('show');
                console.log(event);
                $('[name=id]').val(event.bid);
                $('[name=code]').val(event.code);
                $('[name=contactno]').val(event.contactno);
                $('[name=from]').val(event.start.format('YYYY-MM-DD'));
                $('[name=to]').val(event.end.format('YYYY-MM-DD'));
                $('[name=amount]').val(event.amount);
                $('[name=day]').val(event.daytime);
                $('[name=night]').val(event.nighttime);
                $('[name=package]').val(event.package);
                $('[name=status]').val(event.status);
            }",
            "dayClick" => "function(date, jsEvent, view) {
                $('#reserve').modal('show'); 
                $('[name=start_date]').val(date.format('YYYY-MM-DD'));
                $('[name=end_date]').val(date.format('HH:mm:ss'));
            }"
        ]);
        $packages = Packages::orderBy('id')->get();
        $paypalamount = Bookmassage::orderBy('id','desc')->get();   

        return view('bookmassages.index', ['bookmassages' => $bookmassages, 'packages' => $packages,'paypalamount' => $paypalamount]);
    }

    public function reservation()
    {
      return view('website.pages.reservation');
    }

    public function allreservation()
    {
        $allpackages = Bookmassage::orderBy('id')->get();
      return view('website.pages.allreservation', ['packages' => $allpackages]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookmassages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'code' => 'required',
            'user_id' => 'required',
            'contactno' => 'required',
            'from' => 'required',
            'to' => 'required',
            'amount' => 'required',
            'package' => 'required'
            
        ]);
        $amountpackage = Packages::select('price')->where('packagecode', '=', $request->package)->get();
        $plucked = $amountpackage[0]->price;

        $from = date_format(date_create($request->from),"Y-m-d");
        $to = date_format(date_create($request->to),"Y-m-d");
        $time = date_format(date_create('08:00:00'),"H:i:s");
        $bkms = new Bookmassage();
        $bkms->code = $request->code;
        $bkms->user_id = $request->user_id;;
        $bkms->contactno =  $request->contactno;
        $bkms->start_date =  $from.' '.$time;
        $bkms->end_date =  $to.' '.$time;
        $bkms->amount =  $request->amount;
        $bkms->daytime = $request->day;
        $bkms->nighttime = $request->night;
        $bkms->package = $request->package;
        $bkms->status = "Pending";
        $bkms->save();

        
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
    public function updateStatus($id,$amount,$date)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $bkms = Bookmassage::find($request->id);
        $date = date_format(date_create($request->resvdate),"Y-m-d");
        $time = date_format(date_create($request->resvtime),"H:i:s");
        $bkms->fullname = $request->fullname;
        $bkms->contactno =  $request->contactno;
        $bkms->noofreservation =  $request->noofreservation;
        $bkms->package =  $request->package;
        $bkms->datetime = $date.' '.$time;
        $bkms->status = $request->status;
        Nexmo::message()->send([
            'to'   => '639215128314',
            'from' => 'SJDMB',
            'text' => 'Reservation '.$request->status.' !: '.$date.' '.$time.''
        ]);
        $bkms->save();
        return redirect('/bookmassages')->with('success','Updated successfuly');
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

    public function amount($id)
    {
        $amount = Packages::where("packagecode", $id)->get();
        return response()->json(['success' => true, 'amount' => $amount]);
    }

    public function codeReserved($id)
    {
        $reserved = Bookmassage::where("code", $id)->get();
        return response()->json(['success' => true, 'reserved' => $reserved]);
    }

    public function codePackage($id)
    {
        $codePackage = Packages::where("packagecode", $id)->get();
        return response()->json(['success' => true, 'codePackage' => $codePackage]);
    }
}