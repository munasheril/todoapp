@extends('layout')
 
@section('content')
<div class="container">
    <h2 style="margin-bottom:1em;">Projects</h2>
 
    @if ( !$projects->count() )
        You have no projects
    @else
        <table class="table table-stripe table-bordered">
        <tr>
        <th >PROJECTS</th>
        <th>TASKS</th>
        <th>STATUS</th>
        <th>CREATED AT</th>
        <th>CREATED BY</th>
        <th>BUTTONS</th>        
        </tr>
        
            @foreach( $projects as $project )
            
                <tr>
                    <td>
                        <a href="{{ route('projects.show', $project->slug) }}">{{ $project->name }}</a>
                        
                        </td>
                        <td>
                        {{ $project->tasks->count() }}
                        </td>
                        <td>
                        <div class="progress">
                                 <div class="progress-bar"  style="width:{{$project->progress()}}%;">
                                 </div>
                        </div>
                        </td>
                        <td>
                       <span title="{{$project->created_at}}" data-toggle="tooltip"> {{$project->created_at->diffforHumans()}}</span>
                        
                        </td>
                         <td>
                       {{$project->user->name or ""}}
                        
                        </td>
                        
              <td>
                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.destroy', $project->slug))) !!}
                        
                            {!! link_to_route('projects.edit', 'Edit', array($project->slug), array('class' => 'btn btn-info')) !!} {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        
                    {!! Form::close() !!}
             </td>
                   
                </tr>
            @endforeach
        </table>
        
    @endif
 
    <p>
        {!! link_to_route('projects.create', 'Create Project') !!}
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