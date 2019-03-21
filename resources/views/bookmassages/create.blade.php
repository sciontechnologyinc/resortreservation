@extends('website.master.template')

@section('headerLogo')
 
@endsection

@section('header')
        <li><a href="#"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>home</span></div></a></li>
        <li><a href="#}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>about us</span></div></a></li>
        <li><a href="#"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>Services</span></div></a></li>
        <li><a href="{{ url('/') }}"><div class="nav_item d-flex flex-column align-items-center justify-content-center"><span>Resorts</span></div></a></li>
        <li class="profile-hov"> <div class="nav_item d-flex flex-column align-items-center justify-content-center">
@endsection

@section('header2')
        <li><a href="#">Home</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="{{ url('/') }}">Resorts</a></li>
@endsection
@section('content')

<div class="container reservation-page">
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        <script>
        </script>
    @endif
    @if(count($errors) > 0 )
        <div class="alert alert-danger">
            <strong>Whoooppss !!</strong> There were some problem with your input. <br>
            <ul>
              @foreach($errors->all() as $error)
                  <li> {{ $error }} </li>
              @endforeach
            </ul>
        </div>
     @endif
    <div class="reservation-title mx-0 px-0">RESERVATIONS</div>
    {!! $bookmassages->calendar() !!}
</div>
<br/>
 {!! $bookmassages->script() !!}
 <!-- Modal -->

 <div class="modal fade" id="reserve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         {!! Form::open(['id' => 'dataForm', 'url' => 'paypal', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Reservation Information</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
             <div class="container">
                 <div class="row">
                     <div class="col-md-12 grid-margin stretch-card">
                         <div class="card">
                             <div class="card-body">
                                 <div class="form-group">
                                 {!!Form::label('Reservation Code', 'Reservation Code', array('class' => 'form-control-label'))!!}
                                 {!!Form::text('code', '' , ['placeholder' => '', 'class' => 'form-control col-lg-12', 'readonly' => '' ])!!}
                                @foreach ($companyinformation as $companyinfo)
                                    {!!Form::text('user_id', $companyinfo->user_id , ['placeholder' => '', 'class' => 'form-control col-lg-12','hidden' ])!!}
                                @endforeach
                                 </div>
                                 <div class="form-group">
                                    @foreach ($paypalamount as $item)
                                        {{$item->amount}}
                                    @endforeach
                                 {!!Form::label('contactno', 'Contact No', array('class' => 'form-control-label'))!!}
                                 {!!Form::number('contactno','' , ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
                                 </div>
                                 <div class="form-group">
                                        {!!Form::label('Service', 'Service', array('class' => 'form-control-label'))!!}
                                        <div class="iconic-input">
                                             <div class="input-group margin-bottom-sm">
                                             <span class="input-group-addon">
                                             </span>
                                             <select name="package" class="form-control">
                                                     <option value="" disabled {{ old('department') ? '' : 'selected' }}>Choose a Service</option>
                                                     @foreach($packages as $package)
                                                         <option value="{{$package->packagecode}}" {{ old('package') ? 'selected' : '' }}>{{$package->packagedescription}}</option>
                                                     @endforeach
                                            </select>
                                             </div>
                                       </div>
                                </div>
                                 <div class="form-group">
                                 {!!Form::label('datetime', 'From', array('class' => 'form-control-label'))!!}
                                 {!!Form::date('from',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
                                 </div>
                                 <div class="form-group">
                                        {!!Form::label('datetime', 'To', array('class' => 'form-control-label'))!!}
                                        {!!Form::date('to',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
                                        {!!Form::time('time',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
                                </div>
                                <div class="form-group">
                                        {!!Form::label('datetime', 'Day Time', array('class' => 'form-control-label'))!!}
                                        {!!Form::checkbox('day',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
                                        {!!Form::label('datetime', 'Night Time', array('class' => 'form-control-label'))!!}
                                        {!!Form::checkbox('night',null, ['placeholder' => '', 'class' => 'form-control col-lg-12'])!!}
                                </div>
                               
                                 <div class="form-group">
                                        {!!Form::label('amount', 'Total Amount', array('class' => 'form-control-label'))!!}
                                        {!!Form::number('amount','' , ['placeholder' => '', 'class' => 'form-control col-lg-12', 'readonly'=>''])!!}
                                </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           {!!Form::submit('Make Reservation', ['id' => 'addForm','class' => 'form-control btn btn-primary paypal col-lg-5 offset-6']) !!}
         </div>
         {!! Form::close() !!}
       </div>
     </div>
   </div>
   <div id="paypalmodal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                  <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="{!! URL::to('paypal') !!}">
                    {{ csrf_field() }}
                    <h2 class="w3-text-blue">Payment Form</h2>
                    <p>Demo PayPal form - Integrating paypal in laravel</p>
                    <p>      
                    <label class="w3-text-blue"><b>Enter Amount</b></label>
                    <input class="w3-input w3-border" name="amount"  id="amount" value="1000" type="text"></p>      
                    <button class="w3-btn w3-blue" id="paypalbtn">Pay with PayPal</button></p>
                  </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
   @section('script')
       <script>
            
           $('[name=from],[name=to],[name=day],[name=night]').prop('disabled',true);
           $('[name=code]').val(makeid(8));
           $('[name=package]').change(function(){
            if(days != '0'){
                    $('[name=day]').attr('readonly',true);
                }
            $('[name=from],[name=to],[name=day],[name=night]').prop('disabled',false);
               console.log($('[name=package]').val());
           })
          
                var From_date = new Date($("[name=from]").val());
                var To_date = new Date($("[name=to]").val());
                var diff_date =  To_date - From_date;

                var years = Math.floor(diff_date/31536000000);
                var months = Math.floor((diff_date % 31536000000)/2628000000);
                var days = Math.floor(((diff_date % 31536000000) % 2628000000)/86400000);

               

           function amount(value){
                var From_date = new Date($("[name=from]").val());
                var To_date = new Date($("[name=to]").val());
                var diff_date =  To_date - From_date;

                var years = Math.floor(diff_date/31536000000);
                var months = Math.floor((diff_date % 31536000000)/2628000000);
                var days = Math.floor(((diff_date % 31536000000) % 2628000000)/86400000);
            $.ajax({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/amount/'+value,
                    method:'POST',
                    data:{
                    },
                    success: function(response){
                          var day = (days + 1 ) * 2;
                          var amount = response.amount[0].price;
                          var total = day * amount;
                          if($('[name=night]').prop("checked") == false || $('[name=day]').prop("checked") == false){
                                    var totalamount = total - amount;
                                    $('[name=amount]').val(totalamount);
                                }else{
                                    $('[name=amount]').val(total);
                                }
                            }
                });
           }
           $('[name=package],[name=from],[name=to],[name=night],[name=day]').change(function(){
                var From_date = new Date($("[name=from]").val());
                var To_date = new Date($("[name=to]").val());
                var diff_date =  To_date - From_date;

                var years = Math.floor(diff_date/31536000000);
                var months = Math.floor((diff_date % 31536000000)/2628000000);
                var days = Math.floor(((diff_date % 31536000000) % 2628000000)/86400000);
                if(days != 0){
                    $('[name=day]').attr('disabled',true);
                }else{
                    $('[name=day]').attr('disabled',false);
                }

                if($('[name=night]').prop("checked") == false && $('[name=day]').prop("checked") == false){
                    $('[name=day]').prop("checked",true)
                }

                if(From_date > To_date){
                    alert('Invalid Date');
                   $('[name=from]').val($('[name=to]').val());
                }
                amount($('[name=package]').val());
           })
       </script>
        
   @endsection
@endsection
