<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Announcement;

class AnnouncementController extends Controller
{
    public function create()
	{
	    return view('announcement.create');
	}

	public function store(Request $request)
	{
		var_dump($request);
		$title = $request->title;
    	$body = $request->body;
    	$publisher_id = $request->publisher_id;

    	DB::insert('insert into announcements (title, content, publisher_id) values (?, ?, ?)', [$title, $body, $publisher_id]);
	}
}
