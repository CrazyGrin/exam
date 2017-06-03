<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\User;
use App\Model\Student;

use App\Http\Controllers\Teacher\TeacherController;

class UserController extends Controller
{
    public function index(){
        
        session_start();
        $students;
        $username = $_SESSION["username_stu"];
        $me = DB::select('select * from students where name = ?', [$username]);

        $students = DB::select('select * from students where class_num = ?',[$me[0]->class_num]);

        $data = compact('me','students');

        var_dump($me);

        return view('user.index', ['data' => $data]);

    }

    public function loginPage(){
        session_start();

        if (isset($_SESSION["username_stu"])) {
            return redirect('/user/index/');
        }
        else {
            return view('user.login');
        }
    }

    public function createPage(){
    	return view('user.create');
    }

    public function login(Request $request){

    	$username = $request->username;
    	$password = $request->password;

        $rows = DB::select('select password from users where name = ?', [$username]);

        $competence = DB::select('select auth from users where name = ?', [$username]);

        if (sizeof($rows)!=0 && $password == $rows[0]->password) {
            session_start();
            $_SESSION["username_stu"] = $username;
            $_SESSION["competence"] = $competence;

            return redirect('/user/index');
        }else{
            return "fail";
        };

    }

    public function create(Request $request){

    	$username = $request->username;
    	$password = $request->password;

    	DB::insert('insert into user (username, password) values (?, ?)', [$username, $password]);
    }

    public function update(Request $request){

        session_start();
        $user_id = $request->user_id;
        $username = $request->username;
        $password = $request->password;
        $gender = $request->gender;
        $class_num = $request->class_num;
        $major_num = $request->major_num;
        $major = $request->major;
        $grade = $request->grade;

        $affected = DB::update("update students set 
            name = '{$username}',
            password = '{$password}',
            gender = '{$gender}',
            class_num = '{$class_num}',
            major_num = '{$major_num}',
            major = '{$major}',
            grade = '{$grade}' 
            where id = ?", [$user_id]);

        $_SESSION['username_stu'] = $username;

        if ($affected != 0) {
            return redirect('/user/index');
        }
        else {
            return "未做出更改";
        }
    }

    public function logout(){
        echo "string";
        session_start();
        session_destroy();

        return redirect('/user/login');
    }
}