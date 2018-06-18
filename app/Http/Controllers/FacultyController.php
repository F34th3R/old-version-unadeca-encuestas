<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{

    public function index()
    {
        $faculties = Faculty::get();
        return view('faculties.index', compact('faculties'));
    }

    public function create()
    {
        $user = new User;
        $subjects = Subject::get();
//        $professors = User::where('faculties_id', 'like', $request->faculty_id)->get();
        $professors = DB::table('role_user')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->select('role_user.id', 'users.*')
            ->where(['role_user.role_id' => 4])
            ->get();
        return view('faculties.create', compact('subjects', 'professors'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'professors' => 'required',
        ]);
        $faculty = Faculty::create([
            'name' => $request->name,
        ]);
        $faculty->users->sync($request->get('professors'));
        return redirect()->route('faculties.index');
    }

    public function show(Faculty $faculty)
    {
        $mySubjects = DB::table('faculty_subject')
            ->join('subjects', 'subjects.id', '=', 'faculty_subject.subject_id')
            ->select('faculty_subject.*', 'subjects.*')
            ->where(['faculty_subject.faculty_id' => $faculty->id])
            ->get();
        $faculties = Faculty::where('id', 'like', $faculty->id)->get();
        $professors = DB::table('role_user')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->select('role_user.id', 'users.*')
            ->where(['role_user.role_id' => 4])
            ->where('users.faculties_id', 'like', $faculty->id)
            ->get();
        return view('faculties.show', compact('faculty', 'faculties', 'professors'));
    }

    public function edit(Faculty $faculty)
    {
        $subjects = Subject::get();
        return view('faculties.edit', compact('faculty', 'subjects'));
    }

    public function update(Request $request, Faculty $faculty)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $faculty->update($request->all());
        $faculty->subjects()->sync($request->get('subjects'));
        return redirect()->route('faculties.show', $faculty->id)
            ->with('info', 'The faculty was saved successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Faculty $faculty
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return redirect()->route('faculties.index', $faculty->id)
            ->with('info', 'The faculty was deleted successful');
    }
}
