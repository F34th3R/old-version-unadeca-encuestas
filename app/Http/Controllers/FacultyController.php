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
        $faculties = Faculty::paginate();
        return view('faculties.index', compact('faculties'));
    }

    public function create()
    {
        $subjects = Subject::get();
        $professors = User::whereHas('roles', function ($query) {
            $query->where(['role_id' => 4]);
        })->get();
        return view('faculties.create', compact('subjects', 'professors'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
        ]);
        $faculty = Faculty::create([
            'name' => $request->name,
        ]);
        return redirect()->route('faculties.index');
    }

    public function show(Faculty $faculty)
    {
        $subjects = Subject::whereHas('faculties', function ($query) use($faculty) {
            $query->where('faculty_id', $faculty->id);
        })->get();
        $professors = User::whereHas('roles', function ($query) {
            $query->where(['role_id' => 4]);
        })->where(['faculties_id' => $faculty->id])->get();

        $students = User::whereHas('roles', function ($query) {
            $query->where('role_id', 3);
        })->where('faculties_id', $faculty->id)->get();

        return view('faculties.show', compact('faculty', 'subjects', 'professors', 'students'));
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

    public function delete(Faculty $faculty)
    {
        $subjects = Subject::whereHas('faculties', function ($query) use($faculty) {
            $query->where('faculty_id', $faculty->id);
        })->get();
        $professors = User::whereHas('roles', function ($query) {
            $query->where(['role_id' => 4]);
        })->where(['faculties_id' => $faculty->id])->get();
        return view('faculties.delete', compact('faculty', 'professors', 'subjects'));
    }

    public function destroy(Faculty $faculty)
    {
        try {
            $faculty->delete();
        }catch (\Exception $e) {
            return redirect()->route('faculties.show', $faculty->id)
                ->with('error', 'No se puede eliminar esta facultad.');
        }
        return redirect()->route('faculties.index', $faculty->id)
            ->with('info', 'The faculty was deleted successful');
    }
}
