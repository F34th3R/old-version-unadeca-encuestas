<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{
    public function index()
    {
        $polls = Poll::get();
        return view('polls.index', compact('polls'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Poll $poll)
    {
        $questions = DB::table('poll_question')
            ->join('questions', 'questions.id', '=', 'poll_question.question_id')
            ->select('poll_question.*', 'questions.*')
            ->where(['poll_question.poll_id' => $poll->id])
            ->get();
        $polls = Poll::where('id', 'like', $poll->id)->get();
//        dd($polls);
            return view('polls.show', compact('poll', 'polls', 'questions'));
    }

    public function edit(Poll $poll)
    {
    }

    public function update(Request $request, Poll $poll)
    {
    }

    public function destroy(Poll $poll)
    {
    }
}
