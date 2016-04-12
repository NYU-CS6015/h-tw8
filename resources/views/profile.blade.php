@extends ('layouts.dashboard')
@section('page_heading','User Profile')
@section('section')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel noborder">
				<!-- <div class="panel-heading"></div> -->
				<div class="panel-body">
				    <label class="col-md-3">Name</label>
                    <div class="row">
                    	<p>{{ $profile->first_name . ' ' . $profile->last_name }}</p>
                    	
                    </div>
            		
            		<label class="col-md-3">Address</label>
                    <div class="row">
                    	<p>{{ $location }}</p>
                    	
                    </div>
                    
                    <label class="col-md-3">Birth</label>
                    <div class="row">
                    	<p>{{ $profile->birth }}</p>
                    	
                    </div>

                    <label class="col-md-3">Gender</label>
                    <div class="row">
                    	<p>{{ $profile->gender }}</p>
                    	
                    </div>

                    <label class="col-md-3">Email</label>
                    <div class="row">
                    	<p>{{ $profile->email }}</p>
                    	
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>
@stop
