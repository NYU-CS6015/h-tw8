@extends ('layouts.dashboard')
@section('page_heading','Settings')
@section('section')
<div class="col-sm-12">	
	<div class="row">
        @if(Session::has('flash_notification.message'))
        	<div class="alert alert-{{ Session::get('flash_notification.level') }}" id="addr-success-alert">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Success!</strong> {{ Session::get('flash_notification.message') }}
            </div>
        @endif
        <!-- TODO -->
        <script>


		window.setTimeout(function() {
    		$(".addr-success-alert").fadeTo(500, 0).slideUp(500, function(){
        		$(this).remove(); 
    		});
		}, 4000);

 		</script>
		<ul class="nav nav-tabs">
			<li class="active">
				<a data-toggle="tab" href="#account">Account</a>
			</li>
			<li>
				<a data-toggle="tab" href="#privacy">Privacy</a>
			</li>
			<li>
				<a data-toggle="tab" href="#notifications">Notifications</a>
			</li>
			<li>
				<a data-toggle="tab" href="#labs">Labs</a>
			</li>

		</ul>
		<div class="tab-content">
			<div id="account" class="tab-pane fade in active">
				<div class="container">
    				<div class="row">
        				<div class="col-md-8">
            				<div class="panel noborder">
               				<!-- <div class="panel-heading"></div> -->
	        					<div class="panel-body">
                            		<label class="col-md-3">Password</label>
			                        <div class="row">
			                        	<a href="{{ url('password/reset') }}">Reset</a>
			                        	
			                        </div>
			                        <label class="col-md-3">Address</label>
			                        <div class="row">
			                        	<a href=" {{ url ('address/update') }}">Update</a>
			                        	
			                        </div>
								</div>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
			
			<div id="privacy" class="tab-pane fade">
				<h3>Privacy</h3>
			</div>
			<div id="notifications" class="tab-pane fade">
				<h3>Notifications</h3>
			</div>
			<div id="labs" class="tab-pane fade">
				<h3>Labs</h3>
			</div>
		</div>

	</div>
</div>
@stop
