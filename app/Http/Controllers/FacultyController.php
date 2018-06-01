<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Subject;
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
        $subjects = Subject::get();
        return view('faculties.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string'
        ]);
        Faculty::create($request->all());
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
        return view('faculties.show', compact('faculty', 'faculties'));
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

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return redirect()->route('faculties.index', $faculty->id)
            ->with('info', 'The faculty was deleted successful');
    }
}
