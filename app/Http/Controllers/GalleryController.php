<?php namespace App\Http\Controllers;
use DB;
use App\Quotation;

class GalleryController extends Controller {

	// GET: /gallery/{filter?}
	public function showGalleries($filter = null)
	{	
		// load banner image urls from 'banners' table into '$banner_urls'
		$banner_urls = [];
//		$all_banners = DB::table('banners')->get();
//		
//		// set banners to each entry
//		if ($filter == null || $filter == 'new')
//		{	
//			$banner_urls = $this->setBanner($all_banners, $banner_urls, 'new');
//		}
//		
//		if ($filter == null || $filter == 'add')
//		{	
//			$banner_urls = $this->setBanner($all_banners, $banner_urls, 'add');
//		}
//		
//		if ($filter == null || $filter == 'ren')
//		{	
//			$banner_urls = $this->setBanner($all_banners, $banner_urls, 'ren');
//		}
//		
//		if ($filter == null || $filter == 'dev')
//		{	
//			$banner_urls = $this->setBanner($all_banners, $banner_urls, 'dev');
//		}
		
		// load house ids and images from 'houses' table into '$houses'
		$new_houses = [];
		$add_houses = [];
		$ren_houses = [];
		$dev_houses = [];
		$all_houses = DB::table('houses')->get();
		
		// sort houses into types
		foreach ($all_houses as $house) 
		{
			if ($house->type == 'new')
			{
				$new_houses[] = $house;	
			}
			
			else if ($house->type == 'add')
			{
				$add_houses[] = $house;	
			}
			
			else if ($house->type == 'ren')
			{
				$ren_houses[] = $house;	
			}
			
			else if ($house->type == 'dev')
			{
				$dev_houses[] = $house;	
			}
		}
		
		return view('gallery', 
			[
				'banner_urls' => $banner_urls,			
				'new_houses' => $new_houses,
				'add_houses' => $add_houses,
				'ren_houses' => $ren_houses,
				'dev_houses' => $dev_houses
			]
		);
	}
	
	//	sets 'banner_urls' dictionary entry to image url found in 'banners' table
	private function setBanner($all_banners, $banner_urls, $filter)
	{
		foreach ($all_banners as $entry)
		{
			if ($entry->banner == $filter)
			{
				$banner_urls[$filter] = $entry->location;
			}
		}
		
		return $banner_urls;
	}
}
