<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::paginate();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string'
        ]);
        Subject::create($request->all());
        return redirect()->route('subjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     * @internal param \App\Matter $matter
     */
    public function show(Subject $subject)
    {
        return view('subjects.show', compact( 'subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     * @internal param \App\Matter $matter
     */
    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     * @internal param \App\Matter $matter
     */
    public function update(Request $request, Subject $subject)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $subject->update($request->all());
        return redirect()->route('subjects.show', $subject->id)
            ->with('info', 'The faculty was saved successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     * @internal param \App\Matter $matter
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index', $subject->id)
            ->with('info', 'The faculty was deleted successful');
    }
}
