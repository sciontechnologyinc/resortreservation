@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/auth.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Resort Reservation</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome to Resort Reservation!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
