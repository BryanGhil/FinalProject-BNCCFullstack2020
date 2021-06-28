@extends('layouts.app')

@section('content')
<div class="container">
<div class="card bg-light mt-3 ml-3">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/forum')}}">Forum</a></li>
        <li class="breadcrumb-item">Comment</li>
    </ol>
    </nav>
    <div class="card-header text-muted border-bottom-0">
    Forum 
    </div>
    <div class="card-body pt-0">
    <div class="row">
        <div class="col-7">
            <br>
        <h3 id = "title"><strong>{{$forum->title}}</strong></h3>
        <p class="text-muted text-sm" id="description">{{$forum->description}}</p>
        </div>
        
    </div>
    </div>
</div>
<br>
<div class="card bg-light mt-3 ml-3">
    <form role="comment" method="POST" action="/comment" >
        @csrf

    <div class="card-body">

        <div class="form-group">
        <label for="description">Comment</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Comment" required>
        <input type="hidden" class="form-control" id="user_id" name="user_id" value='{{Auth::user()->id}}'>

        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        </div>

    </div>
    
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary"  >Submit</button>
    </div>

    </form>
</div>

<br>
<h3>Comment</h3>
<br>
    @forelse ($comment as $q)  
    
    <div class="row">
        
    
        <div class="card col-md-4 col-xl-12">
            
            <div class="card-body">
                <div> 				  
                    <span><img src="{{url('img/profile.jpg')}}" alt="Card image cap" width="50" height="50" class="rounded-circle"></span>
                    <span>{{Auth::user()->name}}</span>
                </div>
                <br>
                <p class="text-muted text-sm" id="description">{{$q->description}}</p>
                </div>
                <table>
                    <tr>
                        <td style="display:flex;">
                            &nbsp;&emsp;
                            <a href="{{url('/reply/create')}}" class="btn btn-info btn-sm">Reply</a>&emsp;
                <form method="POST" action="{{ url("/comment/$q->id")}}">
                    @csrf

                    @method('DELETE')
                    <input type="submit" value="Delete"class="btn btn-info btn-sm" style="background-color: #b5a5fd; border-color:#b5a5fd;">
                </form>
                <br>
                        </td>
                    </tr>
                </table>
                <br>
                
                
            @empty
            <tr>
                <td colspan="4" align="center">Tidak ada Comment</td>
            </tr>
            @endforelse
            
        </div>
            
        </div>
        
</div>
@endsection