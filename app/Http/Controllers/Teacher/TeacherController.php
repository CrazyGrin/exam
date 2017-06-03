<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Student;
use App\Model\Teacher;
use App\Model\Announcement;

class TeacherController extends Controller
{

	public function loginPage(){
    	session_start();

    	if (isset($_SESSION["username_tea"])) {
    	    return redirect('/teacher/index/');
    	}
    	else {
    	    return view('teacher.login');
    	}
    }

    public function index(Request $request){

            session_start();
            $username = $_SESSION["username_tea"];
            $me = DB::select('select * from teachers where name = ?' ,[$username]);

            $students = DB::select('select * from students where class_num = ?' ,[$me[0]->class_num]);

            $announcements = DB::select('select * from announcements where publisher_id = ?',[$me[0]->id]);

            // $allStudents = DB::select('select * from students');
            $allStudents = DB::table('students')->paginate(10);

            $data = compact('me','students','announcements','allStudents');

            var_dump($data);

            return view('teacher.index', ['data' => $data]);

    }

    public function login(Request $request){

    	$username = $request->username;
    	$password = $request->password;

        $rows = DB::select('select password from users where name = ? and auth=2', [$username]);

        $competence = DB::select('select auth from users where name = ?', [$username]);

        if (sizeof($rows)!=0 && $password == $rows[0]->password) {
            session_start();
            $_SESSION["username_tea"] = $username;
            $_SESSION["competence"] = $competence;

            return redirect('/teacher/index');
        }else{
            return "fail";
        };

    }

    public function logout(){
        session_start();
        session_destroy();

        return redirect('/teacher/login');
    }
}
