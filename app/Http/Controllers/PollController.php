<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Item;
use App\Poll;
use App\Quarter;
use App\Question;
use App\Subject;
use App\Title;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{
    public function index()
    {
        $polls = Poll::get();
        return view('polls.index', compact('polls'));
    }

    public function create(Poll $poll)
    {
        $questions = Question::whereHas('polls', function ($query) use($poll) {
            $query->where(['poll_id' => $poll->id]);
        })->get();
        return view('polls.create', compact('poll','questions'));
    }

    public function store(Request $request)
    {
//        TODO save different types of poll according the title
        if ($request->titlesid == 1) {
            $poll = Poll::create([
                'titles_id' => $request->titlesid,
                'titleDescription' => $request->titleDescription,
                'description' => $request->description,
                'instruction' => $request->instruction,
                'quarters_id' => $request->quartersid,
                'isClose' => $request->isClose,
            ]);
            $poll->questions()->sync($request->get('questions'));
            $poll->faculties()->sync($request->get('faculties'));
            $poll->subjects()->sync($request->get('subjects'));
            $poll->professors()->sync($request->get('professors'));
            return $poll;
        }
//        TODO : seg[un el titulo se va a guardar de formas diferentes.
        if ($request->titlesid == 2) {
            $poll = Poll::create([
                'titles_id' => $request->titlesid,
                'titleDescription' => $request->titleDescription,
                'description' => $request->description,
                'instruction' => $request->instruction,
                'quarters_id' => $request->quartersid,
                'isClose' => $request->isClose,
            ]);
            $poll->questions()->sync($request->get('questions'));
            $poll->faculties()->sync($request->get('faculties'));
            $poll->subjects()->sync($request->get('subjects'));
            $poll->professors()->sync($request->get('professors'));
            return $poll;
        }
        if ($request->titlesid == 3) {
            $poll = Poll::create([
                'titles_id' => $request->titlesid,
                'titleDescription' => $request->titleDescription,
                'description' => $request->description,
                'instruction' => $request->instruction,
                'quarters_id' => $request->quartersid,
                'isClose' => $request->isClose,
            ]);
            $poll->questions()->sync($request->get('questions'));
            $poll->faculties()->sync($request->get('faculties'));
            $poll->subjects()->sync($request->get('subjects'));
            $poll->professors()->sync($request->get('professors'));
            return $poll;
        }
        if ($request->titlesid == 4) {
            $poll = Poll::create([
                'titles_id' => $request->titlesid,
                'titleDescription' => $request->titleDescription,
                'description' => $request->description,
                'instruction' => $request->instruction,
                'quarters_id' => $request->quartersid,
                'isClose' => $request->isClose,
            ]);
            $poll->questions()->sync($request->get('questions'));
            $poll->faculties()->sync($request->get('faculties'));
            $poll->subjects()->sync($request->get('subjects'));
            $poll->professors()->sync($request->get('professors'));
            return $poll;
        }
        if ($request->titlesid == 5) {
            $poll = Poll::create([
                'titles_id' => $request->titlesid,
                'titleDescription' => $request->titleDescription,
                'description' => $request->description,
                'instruction' => $request->instruction,
                'quarters_id' => $request->quartersid,
                'isClose' => $request->isClose,
            ]);
            $poll->questions()->sync($request->get('questions'));
            $poll->faculties()->sync($request->get('faculties'));
            $poll->subjects()->sync($request->get('subjects'));
            $poll->professors()->sync($request->get('professors'));
            return $poll;
        }
        else {
            $poll = Poll::create([
                'titles_id' => $request->titlesid,
                'titleDescription' => $request->titleDescription,
                'description' => $request->description,
                'instruction' => $request->instruction,
                'quarters_id' => $request->quartersid,
                'isClose' => $request->isClose,
            ]);
            $poll->questions()->sync($request->get('questions'));
            $poll->faculties()->sync($request->get('faculties'));
            $poll->subjects()->sync($request->get('subjects'));
            $poll->professors()->sync($request->get('professors'));
            return $poll;
        }

    }

    public function show(Poll $poll)
    {
        $questions = Question::whereHas('polls', function ($query) use($poll) {
            $query->where(['poll_id' => $poll->id]);
        })->get();
        $polls = Poll::where('id', 'like', $poll->id)->get();
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
