<?php namespace App\Http\Controllers;

use DB;
use Redirect;

class HouseController extends Controller {

	// GET: /house/{id}
	public function showHouse($house_id)
	{
		$photos = DB::table('photos')->where('house_id', $house_id)->get();
		
		if (sizeof($photos) > 0) 
		{
			return view('carousel')->with('photos', $photos);
		}
		
		else 
		{
			return Redirect::to('/gallery');	
		}
	}
}
