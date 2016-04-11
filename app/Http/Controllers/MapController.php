<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as JavaScript;


class MapController extends Controller
{
    
    public function draw() {
    	$entries = DB::table('residences')
    		->where('isActive', true)
    		->get();
    	$locations = [];
    	foreach ($entries as $entry) {
    		$location = $entry->address1
    					. " " 
    				  	. $entry->address2 
    					. " "
    					. $entry->city
    					. " "
    					. $entry->state
    					. " "
    					. $entry->zipcode;
    		array_push($locations, $location);
    	}
    	return view('map', ['locations' => $locations]);
    }
}
