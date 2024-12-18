
@extends('layouts.index')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h3>Welcome, {{ $user_name }}</h3>
                        <hr>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection