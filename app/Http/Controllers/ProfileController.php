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
}
