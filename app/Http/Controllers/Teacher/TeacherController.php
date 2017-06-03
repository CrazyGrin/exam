<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Student;
use App\Model\Teacher;
use App\Model\Announcement;

class TeacherController extends Controller
{
    public function index(Request $request){
    	// $username = $request->$username;
    	// $me = DB::select('select * from teacher where name = ?', [$username]);

    	var_dump($request);

    }

    public function createAnnouncement(){

    }
}
