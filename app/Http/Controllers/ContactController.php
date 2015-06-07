<?php namespace App\Http\Controllers;

class ContactController extends Controller {

	// GET: /contact/
	public function showForm()
	{
//		return 'Contract Controller loaded';
		return view('contact');
	}
	
	// POST: /contact/
	public function processEmail()
	{
		return 'Processing email...';
	}

}
