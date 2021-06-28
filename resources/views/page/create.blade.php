@extends('layouts.app')
@section('content')
<div class="container">
<div class="card card-primary">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/forum')}}">Forum</a></li>
        <li class="breadcrumb-item">Create</li>
    </ol>
    </nav>
    <div class="card-header">
    <h3 class="card-title">Create Forum</h3>
    </div>

    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" action="/forum">
        @csrf

    <div class="card-body">

        <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
        <input type="hidden" class="form-control" id="user_id" name="user_id" value='1';
        
        @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        </div>

        <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Description" required>
        
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        </div>

    </div>
    
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>

    </form>
</div>
</div>
@endsection