<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function showHome()
	{
		return view('pages.home.home', [
			'title' => 'Home',
			'page' => ''
		]);
	}
}
