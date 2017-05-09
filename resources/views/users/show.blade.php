@extends('layout')
 
@section('content')
<div class="container">
    <h2  style="margin-bottom:1em;" >Profile</h2>
    <ol class="breadcrumb">
  <li><a href="{{route('users.index')}}">Users</a></li>
  <li class="active">{{$user->name}}</li>
</ol>
 
    {!! Form::model($user, ['method' => 'PATCH', 'url' =>'/users/'.$user->id.'/change-name' ,'class' =>'form-horizontal']) !!}
     <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'name:',['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
            {!! Form::text('name',Auth::user()->name,['class'=>'form-control']) !!}
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
            <button type="submit" class='btn btn-success'>Save</button>
            
            </div>
        </div>
     </div>
    {!! Form::close() !!}
      
</div>
@endsection
