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
            ->get();
        $event_list = [];
        foreach($events as $key => $event) {
            $event_list[] = Calendar::event(
                $event->fullname,
                false,
                new \DateTime($event->datetime),
                new \DateTime($event->datetime.'+'.$event->noofhours.'hour'),
                $event->id,
                [
                    'bid'=>$event->id,
                    'package'=> $event->packagecode,
                    'status'=> $event->status,
                    'noofhours'=> $event->noofhours,
                    'noofreservation'=> $event->noofreservation,
                    'contactno' => $event->contactno,
                    'description' => $event->packagedescription,
                    'price' => $event->price,
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
            "hiddenDays"=> [ 6, 0 ],
            // "maxTime" => "18:00:00",
            "header"=> [
                "right"=> 'prevYear,prev,next,nextYear',
                "left"=> 'month,agendaWeek,agendaDay,today',
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
                    title : event.package,
                    content : '<span><b>Description: </b>' + event.description + '</span><br />' + '<span><b>Price: </b>' + event.price + '</span><br />' + '<span><b>Status: </b>' + event.status + '</span>'
                });
             }",
             "eventClick" => "function(event) {
                $('#editreserve').modal('show');
                console.log(event);
                $('[name=id]').val(event.bid);
                $('[name=fullname]').val(event.title);
                $('[name=contactno]').val(event.contactno);
                $('[name=resvdate]').val(event.start.format('YYYY-MM-DD'));
                $('[name=resvtime]').val(event.start.format('HH:mm:ss'));
                $('[name=package]').val(event.package);
                $('[name=noofhours]').val(event.noofhours);
                $('[name=noofreservation]').val(event.noofreservation);
                $('[name=status]').val(event.status);
            }",
            "dayClick" => "function(date, jsEvent, view) {
                $('#reserve').modal('show'); 
                $('[name=resvdate]').val(date.format('YYYY-MM-DD'));
                $('[name=resvtime]').val(date.format('HH:mm:ss'));
            }"
        ]);
        $packages = Packages::orderBy('id')->get();
        return view('bookmassages.index', ['bookmassages' => $bookmassages, 'packages' => $packages]);
    }

    public function reservation()
    {
        $packages = Bookmassage::where('fullname', '=', Auth::user()->name)
            ->join('packages', 'packages.packagecode', '=', 'bookmassages.package')
            ->get();

      return view('website.pages.reservation', ['packages' => $packages]);

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
            'noofreservation' => 'required',
            'noofhours' => 'required',
            'package' => 'required'
            
        ]);
        $date = date_format(date_create($request->resvdate),"Y-m-d");
        $time = date_format(date_create($request->resvtime),"H:i:s");
        $bkms = new Bookmassage();
        $bkms->fullname = $request->fullname;
        $bkms->contactno =  $request->contactno;
        $bkms->noofreservation =  $request->noofreservation;
        $bkms->noofhours =  $request->noofhours;
        $bkms->package =  $request->package;
        $bkms->datetime = $date.' '.$time;
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
            'to'   => $request->contactno,
            'from' => 'Nuat Thai',
            'text' => 'Date: '.$date.' '.$time. '            '.
                      'Package: ' .$request->package. '                                     '.
                      '# of Reservation: ' .$request->noofreservation.'                                    '
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
}