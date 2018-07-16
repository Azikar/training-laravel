@extends('Layouts.app')
@section('content')
<h1>Create new ad</h1>
{!! Form::open(['action'=>'AdController@store','method'=>'POST']) !!}
    <div class="form-group">
       {{Form::label('title','Title')}}
      {{Form::text('title','',['class'=>'form-control'])}}
       
    </div>
    <div class="form-group">
            {{Form::label('price','Price')}}
           {{Form::text('price','',['class'=>'form-control'])}}
         </div>

    <div class="form-group">
            {{Form::label('description','Short description')}}
           {{Form::text('description','',['class'=>'form-control'])}}
            
         </div>
         <div class="form-group">
                {{Form::label('Fulldescription','Full description')}}
               {{Form::textarea('Fulldescription','',['id'=>'article-ckeditor','class'=>'form-control'])}}
                
             </div>
             {{Form::submit('Submit',['class'=>'btn'])}}
{!! Form::close() !!}
@endsection