@extends('layouts.app')
@section('content')
<div class="container">
<div class="card card-primary">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/forum')}}">Forum</a></li>
    <li class="breadcrumb-item">Edit</li>
    </ol>
</nav>
<div class="card-header">
    <h3 class="card-title">Edit Forum </h3>
</div>

<form role="form" method="POST" action="/forum/{{$forum->id}}">
    @csrf
    @method('PUT')
    <div class="card-body">

    <div class="form-group">
        <label for="title">Title</label>
    <input type="text" value="{{old('title', $forum->title) }}" class="form-control" id="title" name="title" placeholder="Title" required>
        
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" value="{{old('description', $forum->description) }}" name="description" placeholder="Description" required>
    
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    </div>
    
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Update</button>
    </div>

</form>
</div>
</div>
@endsection