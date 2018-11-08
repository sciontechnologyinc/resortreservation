@extends('admin.master.template')

@section('headerButton')
          <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item">
                        <a href="packages" class="nav-link">Packages</a>
                    </li>
                    <li class="nav-item  active">
                        <a href="#" class="nav-link">Add Package</a>
                    </li>
            </ul>
@endsection

@section('content')
<div class="main-panel">
@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
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
 <link rel="stylesheet" href="{!! ('/css/package.css') !!}">
{!! Form::open(['id' => 'dataForm', 'url' => '/packages', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="content-wrapper">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Package</h4>
                  <form class="forms-sample">
                    <div class="form-group">
                    {!!Form::label('packagecode', 'Package Code', array('class' => 'form-control-label'))!!}
                    {!!Form::text('packagecode',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('packagedescription', 'Package Description', array('class' => 'form-control-label'))!!}
                    {!!Form::text('packagedescription',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::label('price', 'Price', array('class' => 'form-control-label'))!!}
                    {!!Form::text('price',null, ['placeholder' => '', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                    </div>
                    <div class="form-group photo">
                          {!!Form::label('photo', 'Photo', array('class' => 'form-control-label'))!!}
                              <div class="row">
                                <input id="photo" name="photo" class="photo" type="file" accept="image/x-png,image/gif,image/jpeg">
                              </div>
                              <div class="row">
                                <img class="pre_img"  src="https://yourprogramming.com/library/images/no_img.jpg">
                                <p class="image_view"></p><img src="">
                              </div>
                    </div>
                        <div>
                        {!!Form::submit('Submit', ['id' => 'addForm','class' => 'btn btn-success mr-2']) !!}
                        <button class="btn btn-light">Cancel</button>
                        </div>
                      </form>
                    </div>
                  </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>


<style>
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 14px 12px;
    cursor: pointer;
    width:94%;
    font-size: 18px;
    text-align: center;
}

</style>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(function () {
	//logo image preview 
	function filePreview(input){
		if(input.files && input.files[0]){
			var reader = new FileReader();
			reader.onload = function(e){
				$('.pre_img').hide();
				$('.image_view').after('<img src="'+e.target.result+'" />');
				$('.photo img').css('max-width','100%');
				$("#remove_photo").show(200);
				$(".custom-file-upload").slideUp(0);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$('.photo').change(function(){
		filePreview(this);	
		$('.upload_photo').show();
	});

	//remove logo img 
	$("#remove_photo").click(function(){
		$('.photo img').hide();
		$('.pre_img').show();
		$('.photo').val('');
		$("#remove_photo").slideUp(300);
		$('.upload_photo').slideUp();
		$('.custom-file-upload').slideDown(0);
	});
	
	$(".upload_photo").click(function(){
		var new_img = $('.new_img').attr('src');
		$('.pre_img_main').attr('src',new_img);
		var mainPhto = $('.photo').val();
		alert(mainPhto);
	});
	//check is one of the check-box chosen or not
	$('.checkbox-inline').click(function(){
		$('.sub').prop('required',false);
	});


})
</script>
@endsection()

