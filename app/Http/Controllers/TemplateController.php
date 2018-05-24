<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::get();
        return view('polls.template.index', compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Poll $poll)
    {
        $questions = DB::table('poll_question')
            ->join('questions', 'questions.id', '=', 'poll_question.question_id')
            ->select('poll_question.*', 'questions.*')
            ->where(['poll_question.poll_id' => $poll->id])
            ->get();
        $faculties = Faculty::get();
        return view('polls.template.create', compact('poll', 'questions', 'faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'start' => 'required|date',
            'end' => 'required|date',
            'questions' => 'required'
        ]);
        $poll = Poll::create([
            'titles_id' => $request->titles_id,
            'titleDescription' => $request->titleDescription,
            'description' => $request->description,
            'instruction' => $request->instruction,
            'start' => $request->start,
            'end' => $request->end,
            'isClose' => $request->isClose,
        ]);
        $poll->questions()->sync($request->get('questions'));
        $poll->faculties()->sync($request->get('faculty_id'));
        $poll->subjects()->sync($request->get('subjects'));
        return redirect()->route('polls.index');
    }

    public function intermediate(Request $request)
    {
        $myRequest = $request;
//        dd($myRequest);
        $this->validate($request, [
            'start' => 'required|date',
            'end' => 'required|date',
            'questions' => 'required'
        ]);
        $subjects = DB::table('faculty_subject')
            ->join('subjects', 'subjects.id', '=', 'faculty_subject.subject_id')
            ->select('faculty_subject.*', 'subjects.*')
            ->where(['faculty_subject.faculty_id' => $request->faculty_id])
            ->get();
        $questions = DB::table('poll_question')
            ->join('questions', 'questions.id', '=', 'poll_question.question_id')
            ->select('poll_question.*', 'questions.*')
            ->where(['poll_question.poll_id' => $request->id])
            ->get();
//        dd($subjects);
        return view('polls.template.intermediate', compact('myRequest', 'subjects', 'questions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
