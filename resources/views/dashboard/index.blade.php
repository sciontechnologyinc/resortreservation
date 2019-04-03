@extends('admin.master.template')

@section('content')

 <?php

 //Best practice is to create a separate file for handling connection to database
 try{
     
     $link = new \PDO('mysql:host=127.0.0.1;dbname=resortreservation;charset=utf8mb4', 
                        'root', 
                        '', 
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
     
     $handle = $link->prepare('SELECT count(*) as TOTALRES FROM bookmassages'); 
     $handle1 = $link->prepare('SELECT count(*) as USER FROM users'); 
     $handle2 = $link->prepare('SELECT count(*) as STAFF FROM staffs'); 
     $handle3 = $link->prepare('SELECT SUM(amount) as AMOUNT FROM bookmassages WHERE status = "Paid"'); 


     $handle->execute(); 
     $result = $handle->fetchAll(\PDO::FETCH_OBJ);

     $handle1->execute(); 
     $result1 = $handle1->fetchAll(\PDO::FETCH_OBJ);

     $handle2->execute(); 
     $result2 = $handle2->fetchAll(\PDO::FETCH_OBJ);

     $handle3->execute(); 
     $result3 = $handle3->fetchAll(\PDO::FETCH_OBJ);
     foreach($result as $row){
         array($row->TOTALRES);
     }
     foreach($result1 as $row1){
      array($row1->USER);
    } 
    foreach($result2 as $row2){
      array($row2->STAFF);
    } 
    foreach($result3 as $row3){
      array($row3->AMOUNT);
    } 

   
     $link = null;
 }
 catch(\PDOException $ex){
     print($ex->getMessage());
 }

 ?>


<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cube text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Revenue</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{ $amount }}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Weekly Revenue
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Registered Members</p>
                      <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">{{ $users }} </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Total website members
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                    <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right"></p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{ $staff }}  </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Staffs
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-poll-box text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Reservations</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{ $report }} </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Weekly Reservations
                  </p>
                </div>
              </div>
            </div>
          </div>
  
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Reports</h4>
                  <div class="table-responsive">
                      <button class="print"><i class="fa fa-print" aria-hidden="true"></i></button>
                      <table id="datatable" cellpadding="12" border="1" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Code</th>
                          <th>Contact #</th>
                          <th>Amount</th>
                          <th>From</th>
                          <th>To</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($reports as $index => $report)
                      <tr>
                          <td>{{$index +1}} </td>
                          <td>{{$report->code}}</td>
                          <td>{{$report->contactno}}</td>
                          <td>{{$report->amount}}</td>
                          <td>{{$report->start_date}}</td>
                          <td>{{$report->end_date}}</td>
                          <td>{{$report->status}}</td>
                      </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
    
    @endsection  
          

 

