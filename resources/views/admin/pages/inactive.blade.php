@extends('admin.master.template')

@section('headerButton')
         
@endsection

@section('content')
<div class="main-panel">

    <br>
        <div class="form-group">
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  {!!Form::label('datetime', 'Wait for Administrator to Activate your Account ...', array('class' => 'form-control-label'))!!}
        </div>
</div>
@endsection
