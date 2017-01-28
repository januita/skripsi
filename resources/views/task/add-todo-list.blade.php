@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <center>{{ isset($project) ? $project->project_name : '' }} {{ isset($sprintId) ? ' => Sprint ' . $sprint->id : '' }}</center>
                </div>

                {!! Form::open(['route' => ['task.create', $project->id, $sprint->id]]) !!}
                    @if(isset($task))
                        <input type="hidden" name="taskId" value="{!! $task->id !!}">
                    @endif
                    <div class="panel-body">
                    <center>Todo List </center>
                      <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Sprint {{ $sprint->sprint }}</label> 
                            <div class="col-md-7"> 
                            </div>
                        </div>
                        <br/>
                       <table border="1" width="100%">
                       <tr>
                       <td>
                       <br/><br/>
                       <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Task</label> 
                            <div class="col-md-4">
                                <input id="task_name" type="text" class="form-control" name="task_name" value="{{ isset($task) ? $task->activity : '' }}" placeholder="Task Name" required="required">
                            </div>
                             <div class="col-md-4">
                                <select name="assigned_to" class="form-input" id="inputStatus" required>
                                    <option value="">--- assigned to --</option>
                                        @foreach($project->userProjects as $userProject)
                                            <option value="{{$userProject->user_id}}" {{(($userProject->user_id == $task->assigned_to) ? 'selected' : "")}}>{{$userProject->user->fullname}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <br/><br/>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-7">
                                <TEXTAREA id="description" name="description" class="form-control" required>{{ isset($task) ? $task->description : '' }}</TEXTAREA> 
                            </div>
                        </div>
                        <br><br><br>

                        <div class="form-group">
                            <label for="prjDescription" class="col-md-4 control-label">Deadline</label>
                            <div class="col-md-8">
                                <input id="deadline" type="date" name="deadline" value="{{ isset($task) ? $task->deadline_datetime : '' }}">
        
                            </div>
                        </div>
                        <br/><br/>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-6">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="{!! url('/view-todo-list/'.$project->id.'/'.$sprint->id); !!}" class="btn btn-primary">
                                    Cancel
                                </a>
                            </div>
                        </div>
                        <br/><br/>
                        </td>
                        </tr>
                        </table>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection