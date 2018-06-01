<?php

namespace App\Http\Controllers;

use App\Subject;
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
        return redirect()->route('subjects.index');
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', compact( 'subject'));
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
        $subject->update($request->all());
        return redirect()->route('subjects.show', $subject->id)
            ->with('info', 'The faculty was saved successful');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index', $subject->id)
            ->with('info', 'The faculty was deleted successful');
    }
}
