<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    //
	public function getIndex() {
		return view('pages.syncohome');
	}

	public function getView() {
		return view('pages.viewpost');
	}
	public function getMaster() {
		return view('master');
	}
}
