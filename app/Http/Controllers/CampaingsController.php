<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Logic\Image\ImageRepository;
use Illuminate\Support\Facades\Input;

class CampaingsController extends Controller
{

	protected $image;

	public function __construct(ImageRepository $imageRepository)
	{
		$this->image = $imageRepository;
	}

	public function edit()
	{
		return(view('campaings.edit'));
	}

}
