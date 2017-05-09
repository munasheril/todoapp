@extends('layout')
 
@section('content')
<div class="container">
    <h2  style="margin-bottom:1em;">{{ $project->name }}</h2>
    <ol class="breadcrumb">
        <li><a href="{{ route('projects.index') }}">Projects</a></li>
        <li class="active"> {{$project->name}} </a></li>
    </ol>

    @include('tasks.partials._table',
    ['tasks'=> $project->tasks()->orderBy('id','desc')->get(),
    'empty_message'=>'your project has no tasks'])
 
    <p>
        {!! link_to_route('projects.index', 'Back to Projects') !!} |
        {!! link_to_route('projects.tasks.create', 'Create Task', $project->slug) !!}
    </p>
</div>
@endsection

@section('scripts')
<script>
$('form').on('submit',function(e) {
return confirm('Are you sure?');
});
</script>
@endsection