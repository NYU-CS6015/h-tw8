@extends ('layouts.dashboard')
@section('page_heading','User List')
@section('section')
<div class="row">
    <div class="col-lg-8 col-lg-offset-1">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($userNames); $i++)
                        <tr>
                            <td>{{ $userNames[$i] }}</td>
                            <td>{{ $addresses[$i] }}</td>
                            <td>
                            {{ Form::open(array('action' => array('TaskController@take', $userNames[$i]))) }}
                            {{ Form::submit('Follow', array('class' => 'btn btn-info btn-sm')) }}
                            {{ Form::close() }}    
                            </td>
                            
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
