@extends ('layouts.dashboard')
@section('page_heading','User List')
@section('section')
<div class="row">
    @if(Session::has('flash_notification.message'))
        <div class="alert alert-{{ Session::get('flash_notification.level') }}" id="addr-success-alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Success</strong> {{ Session::get('flash_notification.message') }}
        </div>
    @endif  
    <div class="col-lg-7 col-lg-offset-1">
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
                            @if ($followingStatus[$i] == "notFollowed")
                                {{ Form::open(array('action' => array('FollowingController@follow', $userIds[$i]))) }}
                                {{ Form::submit('Follow', array('class' => 'btn btn-info btn-sm btn-block')) }}
                                {{ Form::close() }}                             
                            @elseif ($followingStatus[$i] == "Followed")
                                {{ Form::open(array('action' => array('FollowingController@unfollow', $userIds[$i]))) }}
                                {{ Form::submit('Unfollow', array('class' => 'btn btn-warning btn-sm btn-block')) }}
                                {{ Form::close() }} 
                            @endif
                            <!-- {{ $followingStatus[$i] }} -->
                            </td>
                            
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
