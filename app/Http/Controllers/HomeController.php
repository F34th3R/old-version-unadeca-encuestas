<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\RoleUser;
use App\User;
use App\UserMy;
use App\UserSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        return redirect()->route('home');
    }
    public function index()
    {
        $user = Auth::user();
        $my = UserMy::select('s_register')->where('user_id', $user->id)->get();
        return view('home.index', compact('user', 'my'));
    }

    public function my()
    {
        $feather = 'feather';
        $mySubjects = DB::table('faculty_subject')
            ->join('subjects', 'subjects.id', '=', 'faculty_subject.subject_id')
            ->select('faculty_subject.*', 'subjects.*')
            ->where(['faculty_subject.faculty_id' => Auth::user()->faculties_id])
            ->get();
        return view('home.my.index', compact('mySubjects', 'feather'));
    }

    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'subjects' => 'required',
        ]);
        $user->subjects()->sync($request->get('subjects'));
//        RoleUser::create([
//            'role_id' => 3,
//            'user_id' => $user->id,
//        ]);
//        $user->update([
//            'faculties_id' => $request->faculties_id
//        ]);
        DB::table('user_my')->where('user_id', $user->id)->update([
            's_register' => true,
        ]);
        return redirect()->route('home');
    }
}
