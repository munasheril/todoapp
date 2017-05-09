<div class="form-group">
    {!! Form::label('name', 'Name:',['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
    {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
</div>
 
<div class="form-group">
    {!! Form::label('slug', 'Slug:',['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
    {!! Form::text('slug',null,['class'=>'form-control']) !!}
    </div>
</div>
 
<div class="form-group">
    {!! Form::label('completed', 'Completed:', ['class' => 'col-md-4 control-label'])!!}
     <div class="col-md-8" checkbox>
        <label class="">
          {!! Form::hidden('completed','0') !!}
          {!! Form::checkbox('completed') !!}
        </label>
    </div>
</div>
 
<div class="form-group">
    {!! Form::label('description', 'Description:',['class' => 'col-md-4 control-label'])!!}
    <div class="col-md-8" >
    {!! Form::textarea('description',null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('assignee_id', 'Assignee:',['class' => 'col-md-4 control-label'])!!}
    <div class="col-md-8" >
    {!! Form::select('assignee_id',[''=>'select users']+$users,null,['class'=>'form-control']) !!}
    </div>
</div>
 <div class="form-group">
    {!! Form::label('completion_date', 'completion date:',['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
    {!! Form::text('completion_date', isset($task->completion_date) ? $task->completion_date->format('d/m/Y') : null, ['class'=>'form-control','id' => 'date']) !!}
    </div>
                <!--<span class="glyphicon glyphicon-calendar"></span>
            </span>-->
        </div>
   
<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
    {!! Form::submit($submit_text,['class'=>'btn btn-success']) !!}
    </div>
</div>