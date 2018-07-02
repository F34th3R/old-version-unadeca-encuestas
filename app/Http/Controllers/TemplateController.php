<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Poll;
use App\Quarter;
use App\Question;
use App\Subject;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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
     * @param Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function create(Poll $poll)
    {
        $questions = Question::whereHas('polls', function ($query) use($poll) {
            $query->where(['poll_id' => $poll->id]);
        })->get();
        $faculties = Faculty::get();
        $quarters = Quarter::get();
        return view('polls.template.create', compact('poll', 'questions', 'faculties', 'quarters'));
    }

    public function intermediate(Request $request)
    {
        $myRequest = $request;
        $this->validate($request, [
            'questions' => 'required'
        ]);
        $subjects = Subject::whereHas('faculties', function ($query) use($request) {
            $query->where(['faculty_id' => $request->faculty_id]);
        })->get();
        $questions = Question::whereHas('polls', function ($query) use($request) {
            $query->where(['poll_id' => $request->id]);
        })->get();
        $professors = User::whereHas('roles', function ($query) {
            $query->where(['role_id' => 4]);
        })->where(['faculties_id' => $request->faculty_id])->get();
        return view('polls.template.intermediate', compact('myRequest', 'subjects', 'questions', 'professors'));
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
            'subjects' => 'required',
            'professors' => 'required',
        ]);
        $poll = Poll::create([
            'titles_id' => $request->titles_id,
            'titleDescription' => $request->titleDescription,
            'description' => $request->description,
            'instruction' => $request->instruction,
            'quarters_id' => $request->quarters,
            'isClose' => $request->isClose,
        ]);
        $poll->questions()->sync($request->get('questions'));
        $poll->faculties()->sync($request->get('faculty_id'));
        $poll->subjects()->sync($request->get('subjects'));
        $poll->professors()->sync($request->get('professors'));
        return redirect()->route('polls.index');
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
