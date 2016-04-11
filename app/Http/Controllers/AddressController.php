<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\User;
use App\Resident;
use Flash;


class AddressController extends Controller
{

    //
    public function store(Request $request) {

    	//get current user
    	$user = Auth::user();
    	$userid = $user->id;

    	//validate the submitted form
    	$this->validate($request, [
    		'address1' => 'required|max:255',
    		'address2' => 'max:255',
    		'city' => 'required|max:255',
    		'state' => 'required|max:255',
    		'zipcode' => 'required|numeric',
    		'type' => 'required',
    	]);

    	$preEntry = DB::table('residences')->where('userid', $userid)->where('isActive', true)->get();
    	
        //If pre entry exists, set isActive field to false
        if (count($preEntry) > 0) {
            DB::table('residences')
                ->where('userid', $userid)
                ->where('isActive', true)
                ->update(['isActive' => false]);
        } 


    	DB::table('residences')->insert([
    		'userid' => $userid,
    		'address1' => $request->input('address1'),
    		'address2' => $request->input('address2'),
    		'city' => $request->input('city'),
    		'state' => $request->input('state'),
    		'zipcode' => $request->input('zipcode'),
    		'type' => $request->input('type'),
    		'isActive' => true,
    	]);

        Flash::success('Your address has been updated!');

        return Redirect::to('/settings')
            ->with('addr_success', true)
            ->with('message','Your address has been updated!');

    }
}
