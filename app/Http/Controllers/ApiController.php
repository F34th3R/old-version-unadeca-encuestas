<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Item;
use App\Quarter;
use App\Subject;
use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getData(Request $request) {
        if ($request->password == "f34th3r_supreme") {

            //Subjects
            if ($request->subjects && !empty($request->id)) {
                return Subject::whereHas('faculties', function ($query) use($request){
                    $query->whereIn('faculty_id', $request->id);
                })->get();
            }

            // Professors
            if ($request->professors == true && !empty($request->id)) {
                return User::whereHas('subjects', function ($query) use($request) {
                    $query->whereIn('subject_id', $request->id);
                })->whereHas('roles', function ($query) {
                    $query->where('role_id', 4);
                })->get();
            }

            // Faculties
            if ($request->faculties == true) {
                return Faculty::orderBy('name', 'ASC')->get();
            }

            // Items
            if ($request->items == true) {
                return Item::orderBy('name', 'ASC')->get();
            }
            if ($request->quarters == true) {
                return Quarter::orderBy('name', 'ASC')->get();
            }

            else {
                return "null parameter";
            }
        }
        else {

            return $request;
        }
    }
}
