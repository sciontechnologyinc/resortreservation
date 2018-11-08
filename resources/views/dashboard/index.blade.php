@extends('admin.master.template')

@section('content')

 <?php
 

 //Best practice is to create a separate file for handling connection to database
 try{
     
     $link = new \PDO(   'mysql:host=127.0.0.1;dbname=nuat_thai;charset=utf8mb4', 
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


     $handle->execute(); 
     $result = $handle->fetchAll(\PDO::FETCH_OBJ);

     $handle1->execute(); 
     $result1 = $handle1->fetchAll(\PDO::FETCH_OBJ);

     $handle2->execute(); 
     $result2 = $handle2->fetchAll(\PDO::FETCH_OBJ);
  
     foreach($result as $row){
         array($row->TOTALRES);
     }
     foreach($result1 as $row1){
      array($row1->USER);
    } 
    foreach($result2 as $row2){
      array($row2->STAFF);
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
                        <h3 class="font-weight-medium text-right mb-0">Php 15,650</h3>
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
                        <h3 class="font-weight-medium text-right mb-0">{{ $row1->USER}} </h3>
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
                        <h3 class="font-weight-medium text-right mb-0">{{ $row2->STAFF}} </h3>
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
                        <h3 class="font-weight-medium text-right mb-0">{{ $row->TOTALRES }} </h3>
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
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                          #
                          </th>
                          <th>
                          Full Name
                          </th>
                          <th>
                          Contact #
                          </th>
                          <th>
                          Date
                          </th>
                          <th>
                          Status
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($reports as $index => $report)
                      <tr>
                      @if($report->status == 'Paid')
                          <td>
                          {{$index +1}}
                          </td>
                          <td>{{$report->fullname}}</td>
                          <td>{{$report->contactno}}</td>
                          <td>{{$report->datetime}}</td>
                          <td>{{$report->status}}</td>
                        @endif
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
    
          
          

 
 <?php
 
 $dataPoints = array();
 $dataPoints1 = array();

 //Best practice is to create a separate file for handling connection to database
 try{
      // Creating a new connection.
     // Replace your-hostname, your-db, your-username, your-password according to your database
     $link = new \PDO(   'mysql:host=127.0.0.1;dbname=nuat_thai;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
     
     $handle = $link->prepare('SELECT package, COUNT(*) as TOTAL FROM `bookmassages` GROUP BY package'); 
     $handle1 = $link->prepare('SELECT status, COUNT(*) as TOTAL FROM `bookmassages` GROUP BY status'); 
     $handle->execute(); 
     $result = $handle->fetchAll(\PDO::FETCH_OBJ);

     $handle1->execute(); 
     $result1 = $handle1->fetchAll(\PDO::FETCH_OBJ);
         
     foreach($result as $row){
         array_push($dataPoints, array("label"=> $row->package, "y"=> $row->TOTAL));
     }

     foreach($result1 as $row1){
      array_push($dataPoints1, array("label"=> $row1->status, "y"=> $row1->TOTAL));
  }
     $link = null;
 }
 catch(\PDOException $ex){
     print($ex->getMessage());
 }
     
 ?>             

<script>
 window.onload = function () {
  
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     exportEnabled: true,
     theme: "light1", // "light1", "light2", "dark1", "dark2"
     title:{
         text: "Most Avail Package"
     },
     data: [{
         type: "column", //change type to bar, line, area, pie, etc  
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });

var chart1 = new CanvasJS.Chart("chartContainer1", {
  animationEnabled: true,
     exportEnabled: true,
     theme: "light1", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Per Status Report"
	},
	data: [{
		type: "pie",
    dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});

chart1.render();

chart.render();
  
 }
 </script>

 <div class="col-sm-12 col-lg-12">
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
 </div>
 
 <div class="col-sm-12 col-lg-12">
        <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
 </div>

 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


                    
@endsection

