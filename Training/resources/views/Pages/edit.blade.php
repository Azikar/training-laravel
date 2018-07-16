@extends('Layouts.app')
@section('content')
<h1>Edit ad</h1>
{!! Form::open(['action'=>['AdController@update',$Ad['id']],'method'=>'POST']) !!}
    <div class="form-group">
       {{Form::label('title','Title')}}
      {{Form::text('title',$Ad['Title'],['class'=>'form-control'])}}
       
    </div>
    <div class="form-group">
            {{Form::label('price','Price')}}
           {{Form::text('price',$Ad['Price'],['class'=>'form-control'])}}
         </div>

    <div class="form-group">
            {{Form::label('description','Short description')}}
           {{Form::text('description',$Ad['Description'],['class'=>'form-control'])}}
            
         </div>
         <div class="form-group">
                {{Form::label('Fulldescription','Full description')}}
               {{Form::textarea('Fulldescription',$Ad['DetailedDescription'],['id'=>'article-ckeditor','class'=>'form-control'])}}
                
             </div>
             {{Form::hidden('_method','PUT')}}
             {{Form::submit('Submit',['class'=>'btn'])}}
{!! Form::close() !!}
@endsection