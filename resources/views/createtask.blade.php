@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Post a Task</div>
                <div class="panel-body">
                    {{ Form::open() }}

                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                {{ Form::text('title', null, array('class'=>'form-control', 'value'=>old('title'))) }}
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                {{ Form::textarea('description', null, array('class'=>'form-control', 'value'=>old('description'))) }}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('deadline') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Deadline</label>

                            <div class="col-md-6">
                                {{ Form::date('deadline', \Carbon\Carbon::now(), array('class'=>'form-control', 'value'=>old('deadline'))) }}
                                @if ($errors->has('deadline'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deadline') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bounty') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Bounty Offer</label>

                            <div class="col-md-6">
                                {{ Form::number('bounty', null, array('class'=>'form-control', 'value'=>old('bounty'))) }}
                                @if ($errors->has('bounty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bounty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::submit('submit', array('class'=>'btn btn-primary')) }}

                            </div>
                        </div>

                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
