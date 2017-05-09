@if ( !$tasks ->count() )
        {{$empty_message}}
    @else
        <table class="table table-stripe table-bordered">
        <tr>
                <th>TASK</th>
                <th>COMPLETED</th>
                <th>CREATED AT</th>
                <th>CREATED BY</th>
                <th>COMPLETION DATE</th>
                <th>ASSIGNED TO</th>

                <th>BUTTON</th>
         </tr>    
            @foreach($tasks as $task )
                <tr>
                    <td> 
                        <a href="{{ route('projects.tasks.show', [$task->project->slug, $task->slug]) }}">{{ $task->name }}</a>
                    </td>
                            <td>
                            <div class="form-group">
                                    
                                    <div class="col-md-8" checkbox>
                                    {!! Form::checkbox('completed','',$task->completed,['disabled'=>'']) !!} {{ $task->completed ? 'Completed':'Incomplete' }}
                                    </div>
                                    </div>
                            </td>
                            <td>
                                <span title="{{$task->created_at}}" data-toggle="tooltip"> {{$task->created_at->diffforHumans()}}
                            </td>
                            <td>
                                 {{$task->project->user->name or ""}}
                            </td>
                            <td>
                            {{isset($task->completion_date) ? $task->completion_date->format('d/m/Y') : 'N/A'}}
                            </td>
                            <td>
                                 {{$task->assignee->name or ''}}
                            </td>
                        
                     <td>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.destroy', $task->project->slug, $task->slug))) !!}
                        
                        
                            {!! link_to_route('projects.tasks.edit', 'Edit', array($task->project->slug, $task->slug), array('class' => 'btn btn-info')) !!}
 
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        
                    {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    @endif