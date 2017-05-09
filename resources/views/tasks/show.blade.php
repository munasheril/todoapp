@extends('layout')
 
@section('content')
<div class="container">
    <h2>
        {!! link_to_route('projects.show', $project->name, [$project->slug]) !!} -
        {{ $task->name }}
    </h2>
    <ol class="breadcrumb">
         <li><a href="{{  route('projects.index') }}"> PROJECTS </a>
         <li><a href="{{  route('projects.show',$project) }}"> {{$project->name}} </a></li>
         <li class="active">{{$task->name}}</li>
    </ol>
    {{ $task->description }}
</div>
@endsection