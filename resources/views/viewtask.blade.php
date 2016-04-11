@extends ('layouts.dashboard')
@section('page_heading','Tasks')
@section('section')
<div class="row">
    <div class="col-lg-8">
     @if(Session::has('flash_notification.message'))
        <div class="alert alert-{{ Session::get('flash_notification.level') }}" id="addr-success-alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Success!</strong> {{ Session::get('flash_notification.message') }}
        </div>
    @endif  
    
    @section ('pane2_panel_title', 'Lastest tasks')
    @section ('pane2_panel_body')

        @for ($i = 0; $i < count($tasks); $i++)
            <div class="modal fade" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" id="{{ $tasks[$i]->taskId }}">
    			<div class="modal-dialog" role="document">
    				<div class="modal-content">
    					<div class="modal-header modal-header-info">
    						<h3 class="modal-title" id="myModalLabel">{{ $tasks[$i]->title }}</h3>
    					</div>
    					<div class="modal-body">
    						<p>{{ $tasks[$i]->description }}</p>
  						</div>
					    <div class="modal-footer">
					    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					    </div>
    				</div>
    			</div>
        	</div>

            <div class="modal fade" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" id="confirm{{$tasks[$i]->taskId }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-info">
                            <h3 class="modal-title" id="myModalLabel">Confirm</h3>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure to take on this task?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            {{ Form::open(array('action' => array('TaskController@take', $tasks[$i]->taskId))) }}
                            {{ Form::submit('Confirm', array('class' => 'btn btn-success')) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        @endfor



        <ul class="timeline">
        @for ($i = 0; $i < count($tasks); $i++)

        	@if ($i % 2 == 1)
        		<li class="timeline-inverted">
        	@else
        		<li>
        	@endif
        			@if ($colors = rand(0, 5)) @endif

        	    	@if ($colors == 1)
        	        	<div class="timeline-badge">
        	        @elseif ($colors == 2)
        	        	<div class="timeline-badge success">
        	        @elseif ($colors == 3)
        				<div class="timeline-badge danger">
        			@elseif ($colors == 4)
        				<div class="timeline-badge warning">
        			@else
        				<div class="timeline-badge info">
        			@endif

        			@if ($tasks[$i]->isCompleted)
        					<i class="fa fa-check"></i>
                    @elseif ($tasks[$i]->isTaken) 
                            <i class="fa fa-legal"></i>
        			@elseif ($tasks[$i]->isActive)
        					<i class="fa fa-play"></i>
                    @else 
                            <i class="fa fa-adjust"></i>
        			@endif 
        		</div>


        		<div class="timeline-panel">
        		    <a href="" class="text-muted" data-toggle="modal" data-target="#{{ $tasks[$i]->taskId }}">
	                    <div class="timeline-heading">
	                        <h3 class="timeline-title">{{ $tasks[$i]->title }}</h3>
	                        <p><small class="text-muted"><i class="fa fa-clock-o"></i> {{ $tasks[$i]->releaseDate }}</small>
	                        <small class="text-muted"><i class="fa fa-dollar"></i>{{ $tasks[$i]->bounty }}</small>
	                        </p>
	                    </div>
                    </a>
                    <div class="timeline-body">
                        <p>{{ $tasks[$i]->description }}</p>
                        @if ($tasks[$i]->isTaken == false)
                            <hr>
                            <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#confirm{{ $tasks[$i]->taskId }}">Take!</a>    
                        @endif
                    </div>
                </div>

        	</li>

        @endfor
        </ul>

    @endsection
    @include('widgets.panel', array('header'=>true, 'as'=>'pane2'))
    </div>
</div>
@stop
