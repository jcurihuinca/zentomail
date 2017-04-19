<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Business,
	App\Users;

	use Auth;

class BusinessController extends Controller
{

	public function getMyAccount()
	{
		$data = Business::where('user_id', Auth::user()->id)->first();
		// $data_user = Users::where('id', Auth::user()->id)->first();

		return(view('business.my-account', compact('data')));
	}

	public function postMyAccount()
	{
		die('post Mi cuenta');
	}

}
