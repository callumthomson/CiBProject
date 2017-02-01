<?php

namespace App\Http\Controllers\Api;

use Auth;

use App\Repositories\APIToken;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function auth(Request $request)
	{
		$credentials = [
			'username' => $request->input('username'),
			'password' => $request->input('password'),
		];
		if(Auth::once($credentials)) {
			APIToken::createOn(Auth::user());
			return [
				'_token' => Auth::user()->api_token,
			];
		} else {
			return response(null, 403);
		}
	}
}
