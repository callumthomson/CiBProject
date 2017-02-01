<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;
use Auth;

use App\Project;

class AuthController extends Controller
{
	private $validatorMessages = [
		'username.required' => 'You need to provide your username',
		'password.required' => 'You need to provide your password'
	];

	public function getLoginPage()
	{
		return view('pages.login.login');
	}

	public function login(Request $request)
	{
		$validator = $this->validateAuth($request);
		if($validator->fails()) {
			$request->session()->flash('errors', $validator->errors()->all());
			return redirect('login');
		}
		$credentials = [
			'username' => $request->input('username'),
			'password' => $request->input('password'),
		];
		$remember = ($request->input('remember') == '1');

		if(Auth::attempt($credentials, $remember)) {
			return redirect('home');
		} else {
			$request->session()->flash('error', 'Username or password incorrect.');
			return redirect('login');
		}
	}

	public function logout()
	{
		Auth::logout();
		return redirect('login');
	}

	private function validateAuth(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'username' => 'required|string',
			'password' => 'required|string',
			'remember' => 'required|boolean',
		], $this->validatorMessages);
		return $validator;
	}
}
