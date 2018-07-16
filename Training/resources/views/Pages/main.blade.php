@extends('Layouts.app')
@section('content')
<p>Sort by date</p>
<button type="button" class="btn btn-default" onclick="window.location='{{ url("/home/sort/desc") }}'">Newest </button>
<button type="button" class="btn btn-default" onclick="window.location='{{ url("/home/sort/asc") }}'">Oldest </button>
<br></br>

<h1>Advertisements</h1>
<ul class="list-group" id="here">
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
Posted on: {{$ad->created_at}}  By:{{$ad->name}}
</div>
</div>
</li>


@endforeach
</ul>
@else
<p>No ads available</p>
@endif

{{$ads->links()}}
@stop
@section('script')
<script>
        var path=window.location.pathname;
        var interval;
        var param=null;
        param= decodeURIComponent( window.location.href.slice( window.location.href.indexOf( '=' ) + 1 ) );
        param=parseInt(param);
        console.log( parseInt(param));
        Number.isInteger(param)
        if((path=="/home"&&(param<2|| Number.isInteger(param)==false))||(path=="/home/sort/desc"&&(param<2|| Number.isInteger(param)==false))){
            update();
            
           
        //$(document).ready(function(){
        //    interval=setInterval(function(){
         //       $("#here").load("/Main_reload")
         //       console.log(path);
         //   },3000);
       // });}
        }
        else
        {
            clearInterval(interval);
        }



        function update(){
            $(document).ready(function(){
            interval=setInterval(function(){
                $("#here").load("/Main_reload")
                console.log(path);
            },3000);
        });}

        </script>

@endsection

