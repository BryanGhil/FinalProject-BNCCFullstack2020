@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary mb-3" href="{{url('/forum/create')}}">Create New Post</a>
    @forelse ($forum as $key => $q)
    <div class="row">
        
    
        <div class="card col-md-4 col-xl-12">
            
            <div class="card-body">
                    
                <a class="card-link"><h5 class="card-title"><strong>{{$q->title}}</strong></h5></a>
                        <p class="card-text">{{$q->description}}</p>
                </div>
                <table>
                    <tr>
                        <td style="display:flex;">
                            &nbsp;&emsp;
                            <a href="{{ url('/forum', ['forum' => $q->id] ) }}" class="btn btn-info btn-sm">Comment</a>&emsp;
        
                            <a href="{{ url("/forum/$q->id/edit") }}" class="btn btn-info btn-sm" style="background-color: #3DE670 ;border-color:#3DE670;">Edit</a>&emsp;
        
                            <form method="POST" action="{{ url("/forum/$q->id")}}">
                                @csrf
        
                                @method('DELETE')
                                <input type="submit" value="Delete"class="btn btn-info btn-sm" style="background-color: #b5a5fd; border-color:#b5a5fd;">
                            </form>
                                
                            </td>
                    </tr>
                </table>
                <br>
                
                
            @empty
            <tr>
                <td colspan="4" align="center">Tidak ada Forum</td>
            </tr>
            @endforelse
            
        </div>
            
        </div>
        
    
</div>

@endsection