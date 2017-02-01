<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Activity;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function activities()
	{
		return Activity::all();
	}
}
