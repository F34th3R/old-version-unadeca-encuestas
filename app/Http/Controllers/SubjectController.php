<?php

namespace App\Http\Controllers;

use App\Subject;
use App\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string'
        ]);
        Subject::create($request->all());
        return redirect()->route('subjects.index')->with('message', 'La materia fue creada con éxito!');
    }

    public function show(Subject $subject)
    {
        $students = User::whereHas('subjects', function ($query) use($subject) {
            $query->where('subject_id', $subject->id);
        })->whereHas('roles', function ($query) {
            $query->where('role_id', 3);
        })->get();

        $professors = User::whereHas('subjects', function ($query) use($subject) {
            $query->where('subject_id', $subject->id);
        })->whereHas('roles', function ($query) {
            $query->where('role_id', 4);
        })->get();

        return view('subjects.show', compact( 'subject', 'professors', 'students'));
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        try {
            $subject->update($request->all());
        } catch (\Exception $e) {
            return redirect()->route('subjects.show', $subject->id)
                ->with('error', 'Uups! Hubo un error al editar la materia');
        }

        return redirect()->route('subjects.show', $subject->id)
            ->with('info', 'The faculty was saved successful');
    }

    public function delete(Subject $subject)
    {
        $students = User::whereHas('subjects', function ($query) use($subject) {
            $query->where('subject_id', $subject->id);
        })->whereHas('roles', function ($query) {
            $query->where('role_id', 3);
        })->get();

        $professors = User::whereHas('subjects', function ($query) use($subject) {
            $query->where('subject_id', $subject->id);
        })->whereHas('roles', function ($query) {
            $query->where('role_id', 4);
        })->get();
        return view('subjects.delete', compact('subject', 'professors', 'students'));
    }

    public function destroy(Subject $subject)
    {
        try {
            $subject->delete();
        } catch (\Exception $e) {
            return redirect()->route('subjects.show', $subject->id)
                ->with('error', 'No se puede eliminar esta materia.');
        }
        return redirect()->route('subjects.index', $subject->id)
            ->with('message', 'La materia fue eliminada exitosamente.');
    }
}
