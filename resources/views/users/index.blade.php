
@extends('layout')
 
@section('content')
<div class="container">
    <h2 style="margin-bottom:1em;">Users!!</h2>
</div>
<table class="table table-stripe table-bordered">
        <tr>
        <th >User Name</th>
        <th>Email Id</th> 
        <th>Created On</th>
        @if(Auth::user()->privilege == 0)
        <th>Buttons</th>
        @endif
        
        </tr>
        
            @foreach( $users as $user )
            
                <tr>
                    <td>
                        <a href="{{ route('users.show', $user->slug) }}">{{ $user->name }}</a>
                        
                        </td>
                        <td>
                        {{ $user->email }}
                        </td>
                    
                        </td>
                        <td>
                       <span title="{{$user->created_at}}" data-toggle="tooltip"> {{$user->created_at->diffforHumans()}}</span>
                        
                        </td>
                        @if(Auth::user()->privilege == 0)
                 <td>
                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('users.destroy', $user->id))) !!}
                        
                            {!! link_to_route('users.edit', 'Change Password', array($user->id), array('class' => 'btn btn-info')) !!}   {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                             
                        
                    {!! Form::close() !!}
             </td>      
             @endif
                </tr>
            @endforeach
        </table>
    
</div>
@endsection
@section('scripts')
<script>
$('form').on('submit',function(e) {
return confirm('Are you sure?');
});
</script>
@endsection