@extends('layouts.app')

@section('content')


    
        
<p>Sort by date</p>
<button type="button" class="btn btn-default" onclick="window.location='{{ url("/MyAds/sort/desc") }}'">Newest </button>
<button type="button" class="btn btn-default" onclick="window.location='{{ url("/MyAds/sort/asc") }}'">Oldest </button>
<br></br>

<h1>My Advertisements</h1>
    @if (session('status'))
        <div class="alert alert-success">
             {{ session('status') }}
        </div>
    @endif
                    
    <ul class="list-group">
         @if(count($ads)>0)
             @foreach($ads as $ad)
                           
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-8">
                            <h4><a href="/home/{{$ad->id}}">{{$ad->Title}}</a>
                            </h4>
                            <strong>Description:</strong>
                            <p>{{$ad->Description}}</p>
                        </div>
                        <div class="col-md-3">
                            <p>Posted on: {{$ad->created_at}} By {{$username}}</p>
                        </div>
                    </div>
                </li>
                   
            @endforeach
            {{$ads->links()}}
        @else
                <p>No ads available</p>
        @endif
    </ul>
       

@endsection
