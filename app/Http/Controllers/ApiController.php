<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Item;
use App\Quarter;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    public function getData($type, $id, $key)
    {
        $myPass = "f34th3r_3117";
        if ($key == $myPass) {
            if ($type == "quarters") {
                return Quarter::orderBy('name', 'ASC')->get();
            }
            if ($type == "professors") {
                $id_P = DB::table('role_user')
                    ->join('users', 'users.id', '=', 'role_user.user_id')
                    ->select('role_user.*', 'users.id')
                    ->where(['role_user.role_id' => 4 ])
                    ->get();
                return $id_P;
            }
            if ($type == "subjects") {
                $subjects = DB::table('faculty_subject')
                    ->join('subjects', 'subjects.id', '=', 'faculty_subject.subject_id')
                    ->select('faculty_subject.id', 'subjects.*')
                    ->where(['faculty_subject.faculty_id' => $id])
                    ->get();
                return DB::table('faculty_subject')
                    ->join('subjects', 'subjects.id', '=', 'faculty_subject.subject_id')
                    ->select('faculty_subject.id', 'subjects.*')
//                    ->whereIn('faculty_subject.faculty_id', $id)
                    ->where(['faculty_subject.faculty_id' => $id])
                    ->get();
            }
            if ($type == "faculties") {
                return Faculty::orderBy('name', 'ASC')->get();
            }
            if ($type == "items") {
                return Item::orderBy('name', 'ASC')->get();
            }

        }
        else {
            return "error";
        }
    }
}
