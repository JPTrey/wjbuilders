<?php 	
//namespace App;
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;
use DB;
use Input;
use App\House;
use App\Photo;
use Redirect;

class AdminController extends Controller {

	// GET: /admin/login
	public function showLogin()
	{
		if (Auth::check())
		{
			return Redirect::to('/admin/manage');
		}
		
		return view('auth.login');
	}
	
	// GET: /admin/manage
	public function showGalleries() 
	{
		$all_imgs = [];
		$all_houses = DB::table('houses')->get();
		foreach ($all_houses as $house)
		{
			$house_imgs = DB::table('photos')->where('house_id', $house->id)->get();
			foreach ($house_imgs as $img)
			{
				$all_imgs[$house->id] = $img;
			}
		}
		
		$all_imgs = DB::table('photos')->get();
		
		return view('admin.manage', 
			[
				'all_imgs' => $all_imgs,
				'all_houses' => $all_houses
			]
		);
	}
	
	// GET: /admin/upload
	public function showUpload($house_id = 1) 
	{
		return view('admin.upload', 
			[
				'house_id' => $house_id,
				'house_list' => $this->getHouseList()
			]
		);
	}
	
	// POST: /admin/upload
	public function attemptUpload() 
	{	
		// add new Photo to database
		$img_file = Input::file('file');
		$filename = $this->getFilename();
		if (Input::get('house') != 0)		// if: adding to existing house
		{
			$house_id = Input::get('house');
			$house_alias = DB::table('houses')->where('id', $house_id)->pluck('alias');
			$folder = DB::table('houses')->where('id', $house_id)->pluck('type');
		}
		else 
		{
			// create new entry in 'houses' table
			$house_name = Input::get('new_house');
			$house_alias = $this->getFilename();
			$folder = Input::get('type');
			$house_id = DB::table('houses')->insertGetId(
				[
					'name' => $house_name,
					'alias' => $house_alias,
					'type' => $folder,
					'preview_img' => '/img/'.$folder.'/'.$house_alias.'/'.$filename		// set this photo as gallery preview
				]	
			);
			
		}
		
		$photo = new Photo;
		$photo->house_id = $house_id;
		$photo->location = '/img/'.$folder.'/'.$house_alias.'/'.$filename;
		
		// assign type(s)
		if (Input::get('house-check'))
		{
			$photo->house = true;
		}
		
		if (Input::get('gallery-check'))
		{
			$photo->gallery = true;
			$house = House::find($photo->house_id);
			$house->preview_img = $photo->location;
			$house->save();	
		}
		
		if (Input::get('banner-check'))
		{	
			$photo->banner = true;
			if (Input::get('featured_text'))
			{
				$photo->featured_text = Input::get('featured_text');
			}
		}
	
		// copy file to local storage
		$destination = public_path().'\\img\\'.$folder.'\\'.$house_alias.'\\';
		try 
		{
    		$img_file->move($destination, $filename);		// copy file to public storage
			$photo->save(); // update database	
			return view('admin.upload', 
				[
					'success' => 'Photo added successfully!',
					'house_id' => $house_id,
					'photo_url' => $photo->location,
					'house_list' => $this->getHouseList()
				]
			);
		} 
		catch(Exception $e) 
		{
 			$e->getMessage();
		}
		
		return view('admin.upload')->with('failure', 'Something went wrong.  Please try again later.');
	}
	
	// GET: /admin/edit-house/{id}
	public function viewHouse($id) 
	{
		return view('admin.edit-house', 
			[
				'house' => House::find($id),
				'house_imgs' => DB::table('photos')->where('house_id', $id)->get()
			]
		);
	}
	
	// POST: /admin/edit-house/{id}
	public function editHouse($id) 
	{
		$house = House::find($id);
		$house->name = Input::get('name');
		$house->type = Input::get('type');
		$house->preview_img = Input::get('preview_img');
		$house->save();
		
		return view('admin.edit-house', 
			[
				'success' => 'Your changes were saved.',
				'house' => House::find($id),
				'house_imgs' => DB::table('photos')->where('house_id', $id)->get()
			]
		);
	}
	
	// GET: /admin/photo/{id}
	public function viewPhoto($id)
	{
		$photo = DB::table('photos')->where('id', $id)->first();
		return view('admin.photo', 
			[
				'photo' => $photo, 
				'house_list' => $this->getHouseList()
			]
		);
	}
	
	// POST: /admin/photo/{id}
	public function editPhoto($id)
	{
		$photo = Photo::find($id);
		$photo->house_id = Input::get('house');
		$photo->house = Input::get('house-check');
		$photo->gallery = Input::get('gallery-check');
		$photo->banner = Input::get('banner-check');
		$photo->save();
		
		// if: 'gallery-check' == true, update preview_img for house
		if ($photo->gallery == true)
		{
			$house = House::find($photo->house_id);
			$house->preview_img = $photo->location;
			$house->save();	
		}
		
		return view('admin.photo', 
			[
				'photo' => $photo,
				'house_list' => $this->getHouseList(),
				'success' => 'Your changes were saved.'
			]
		);
	}
	
	// GET: /admin/delete-photo/{id}
	public function confirmDeletePhoto($id)
	{
		$photo = DB::table('photos')->where('id', $id)->delete();
		return Redirect::to('/admin/manage');
	}
	
	// GET: /admin/delete-house/{id}
	public function confirmDeleteHouse($id)
	{
		$photo = DB::table('house')->where('id', $id)->delete();
		return Redirect::to('/admin/manage');
	}
	
	// POST: /admin/delete-photo/{id}
	public function deletePhoto($id)
	{
		$photo = Photo::find($id);
		$photo->house_id = Input::get('house');
		$photo->house = Input::get('house-check');
		$photo->gallery = Input::get('gallery-check');
		$photo->banner = Input::get('banner-check');
		$photo->save();
		
		// if: 'gallery-check' == true, update preview_img for house
		if ($photo->gallery == true)
		{
			$house = House::find($photo->house_id);
			$house->preview_img = $photo->location;
			$house->save();	
		}
		
		return view('admin.photo', 
			[
				'photo' => $photo,
				'house_list' => $this->getHouseList(),
				'success' => 'Your changes were saved.'
			]
		);
	}
	
	// GET: /admin/preview
	public function previewGallery() 
	{
		return view('admin.preview-gallery');
	}
	
	// Helper functions
	
	private function getHouseList() {
		$houses = DB::table('houses')->get();
		$house_list = [];
		foreach ($houses as $house)
		{
			$house_list[$house->id] = $house->name;
		}
		$house_list[0] = 'Create New...';
		return $house_list;
	}
	
	private function getFilename($length = 10) 
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) 
		{
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}	
}
