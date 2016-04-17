<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Flash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    //
    public function show() {
    	$user = Auth::user();
    	$userid = $user->id;

    	$profile = DB::table('users')
    		->where('id', $userid)
    		->first();
    	
    	$address = DB::table('residences')
    		->where('userid', $userid)
    		->where('isActive', true)
    		->first();

    	if (count($address) == 0) {
            Flash::error('You have not registered with an address, please add an address first');
            return Redirect::to('/address/update');
        }


    	$location = $address->address1
    					. " " 
    				  	. $address->address2 
    					. " "
    					. $address->city
    					. " "
    					. $address->state
    					. " "
    					. $address->zipcode;

    	return view('profile', array('profile' => $profile, 'location' => $location));
    }

    public function showUserList() {
        $currentUser = Auth::user();
        $currentUserId = $currentUser->id;

        $allUsersExceptCurrent = DB::table('users')
            ->where('id', '<>', $currentUserId)
            ->get();

        $userNames = [];
        $addresses = [];

        foreach ($allUsersExceptCurrent as $user) {
            $fullName = $user->first_name . " " . $user->last_name;
            array_push($userNames, $fullName);

            $location = DB::table('residences')
                ->where('userid', $user->id)
                ->where('isActive', true)
                ->first();

            $address = "";
            if (count($location) != 0) {
                $address = $location->address1
                        . " " 
                        . $location->address2 
                        . " "
                        . $location->city
                        . " "
                        . $location->state
                        . " "
                        . $location->zipcode;
                array_push($addresses, $address);
            }
        }
        return view('userlist', array('userIds' => $userIds, 'userNames' => $userNames, 'addresses' => $addresses));
    }
}
