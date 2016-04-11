@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @if(Session::has('flash_notification.message'))
            <div class="alert alert-{{ Session::get('flash_notification.level') }}" id="addr-success-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Success!</strong> {{ Session::get('flash_notification.message') }}
            </div>
        @endif  
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Address</div>
                <div class="panel-body">
                    {{ Form::open() }}

                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Address Line 1</label>

                            <div class="col-md-6">
                                {{ Form::text('address1', null, array('class'=>'form-control', 'value'=>old('address1'))) }}
                                <!-- {{ Form::text('first_name', null, array('class'=>'form-control input-sm','placeholder'=>'First Name')) }} -->
                                @if ($errors->has('address1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Address Line 2</label>

                            <div class="col-md-6">
                                <!-- <input type="text" class="form-control" name="address2" value="{{ old('address2') }}"> -->
                                {{ Form::text('address2', null, array('class'=>'form-control', 'value'=>old('address2'))) }}
                                @if ($errors->has('address2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <!-- <input type="text" class="form-control" name="city" value="{{ old('city') }}"> -->
                                {{ Form::text('city', null, array('class'=>'form-control', 'value'=>old('city'))) }}
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">State</label>

                            <div class="col-md-6">
                                {{ Form::select('state', array(
                                    '' => "",
                                    'AL' => "Alabama",
                                    'AK' => "Alaska",
                                    'AZ' => "Arizona",
                                    'AR' => "Arkansas",
                                    'CA' => "California",
                                    'CO' => "Colorado",
                                    'CT' => "Connecticut",
                                    'DE' => "Delaware",
                                    'DC' => "District Of Columbia",
                                    'FL' => "Florida",
                                    'GA' => "Georgia",
                                    'HI' => "Hawaii",
                                    'ID' => "Idaho",
                                    'IL' => "Illinois",
                                    'IN' => "Indiana",
                                    'IA' => "Iowa",
                                    'KS' => "Kansas",
                                    'KY' => "Kentucky",
                                    'LA' => "Louisiana",
                                    'ME' => "Maine",
                                    'MD' => "Maryland",
                                    'MA' => "Massachusetts",
                                    'MI' => "Michigan",
                                    'MN' => "Minnesota",
                                    'MS' => "Mississippi",
                                    'MO' => "Missouri",
                                    'MT' => "Montana",
                                    'NE' => "Nebraska",
                                    'NV' => "Nevada",
                                    'NH' => "New Hampshire",
                                    'NJ' => "New Jersey",
                                    'NM' => "New Mexico",
                                    'NY' => "New York",
                                    'NC' => "North Carolina",
                                    'ND' => "North Dakota",
                                    'OH' => "Ohio",
                                    'OK' => "Oklahoma",
                                    'OR' => "Oregon",
                                    'PA' => "Pennsylvania",
                                    'RI' => "Rhode Island",
                                    'SC' => "South Carolina",
                                    'SD' => "South Dakota",
                                    'TN' => "Tennessee",
                                    'TX' => "Texas",
                                    'UT' => "Utah",
                                    'VT' => "Vermont",
                                    'VA' => "Virginia",
                                    'WA' => "Washington",
                                    'WV' => "West Virginia",
                                    'WI' => "Wisconsin",
                                    'WY' => "Wyoming"
                                ), null, array('class'=>'form-control' )) }}

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">ZIP Code</label>

                            <div class="col-md-6">
                                <!-- <input type="tel" class="form-control" name="zipcode" value="{{ old('zipcode') }}"> -->
                                {{ Form::number('zipcode', null, array('class'=>'form-control', 'value'=>old('zipcode'))) }}
                                @if ($errors->has('zipcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
<!--                                 <select class="form-control">
                                    <option value="residential">Residential</option>
                                    <option value="commercial">Commercial</option>
                                </select> -->
                                {{ Form::select('type', array(
                                    'residential' => 'Residential',
                                    'commercial'  => 'Commercial'
                                ), 'Residential', array('class'=>'form-control' )) }}

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
<!--                                 <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Submit
                                </button> -->
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
