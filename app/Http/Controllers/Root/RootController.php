<?php

namespace App\Http\Controllers\Root;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use App\Model\User;
use App\Model\Student;
use App\Model\Announcement;
use App\Model\teacher;

class RootController extends Controller
{
    public function index(){
    	$users = DB::select('select * from users');

    	var_dump($users);
    	return view('root.index', ['users' => $users]);
    }
    public function loginPage(){
		return view('root.login');
    }
}