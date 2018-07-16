@extends('Layouts.app')
@section('content')


<div class="panel panel-default">
        <div class="panel-heading"><h1>{{$Ad['Title']}}</h1></div>
        <div class="panel-body">
        <p class="text-success">${{$Ad['Price']}}</p>

<p>{!!$Ad['DetailedDescription']!!}</p>
<p>Created by:<strong>{{$user['name']}}   </strong>date:<strong>{{$Ad['created_at']}}</strong></p>
</div>
<hr>
@if(!Auth::guest())
@if(Auth::user()->id===$Ad['user_id'])
<a href="/home/{{$Ad['id']}}/edit" class= "btn btn-primary">edit</a>
{!!Form::open(['action'=>['AdController@destroy',$Ad['id']],'id'=>'delete','class'=>'pull-right','method'=>'POST'])!!}
{{Form::hidden('_method','DELETE')}}
{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
{!!Form::close()!!}
@endif
@endif
</div>

@endsection