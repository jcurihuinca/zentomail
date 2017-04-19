<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;
use Response;

class ImageController extends Controller
{

	public function getUpload()
	{
		return view('pages.upload');
	}

	public function postUpload()
	{

		$input = Input::all();

		$rules = array(
			'file' => 'image|max:3000',
			);

		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			return Response::make($validation->messages()->first(), 400);
		}

        $destinationPath = 'uploads'; // upload path
        $extension = Input::file('file')->getClientOriginalExtension(); // getting file extension
        $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
        $upload_success = Input::file('file')->move($destinationPath, $fileName); // uploading file to given path

        if ($upload_success) {
        	$success_message = array( 'success' => 200,
                        'filename' => '/'.$destinationPath.'/'.$fileName,
                        );
        	return json_encode($success_message);
        	// return Response::json('success', 200);
        } else {
        	return Response::json('error', 400);
        }
    }


public function deleteUpload()
{

	$filename = Input::get('id');

	if(!$filename)
	{
		return 0;
	}

	$response = $this->image->delete( $filename );

	return $response;
}
}