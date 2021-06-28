@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card card-primary">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/forum')}}">Forum</a></li>
            <li class="breadcrumb-item">Profile</li>
        </ol>
        </nav>
        <div class="card-header">
        <h3 class="card-title">Profile</h3>
        </div>
        
        <div> 				  
            <span><img src="img/profile.jpg" alt="Card image cap" width="50" class="rounded-circle"></span>
            </div>
            <h5>Nama  :  {{Auth::user()->name}}</h5>
            <h5>Email :  {{Auth::user()->email}}</h5>
            <br>
            

        
        
    </div>
    </div>
@endsection