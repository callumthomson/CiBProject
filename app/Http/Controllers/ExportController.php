<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ExportController extends Controller
{
    public function showExportPage()
	{
		return view('pages.export.export', [
			'title' => 'Export to CSV files',
			'page' => 'export'
		]);
	}

	public function download()
	{
		new \App\Repositories\CSVCreator();
		return response()->download(public_path().'/timesheets.zip');
	}
}
