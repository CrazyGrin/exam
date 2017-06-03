<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AnnouncementController extends Controller
{
    public function create()
	{
	    return view('announcement.create');
	}

	public function store(){
		echo "string";
	}
}
