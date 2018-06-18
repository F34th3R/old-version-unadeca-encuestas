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
//        $questions =Question::get();
        $questions = DB::table('poll_question')
            ->join('questions', 'questions.id', '=', 'poll_question.question_id')
            ->select('poll_question.*', 'questions.*')
            ->where(['poll_question.poll_id' => $poll->id])
            ->get();
        $faculties = Faculty::get();
//        $subjects = Subject::get();
        $professor = DB::table('role_user')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->select('role_user.*', 'users.id')
            ->where(['role_user.role_id' => 4 ])
            ->get();
        $subjects = DB::table('faculty_subject')
            ->join('subjects', 'subjects.id', '=', 'faculty_subject.subject_id')
            ->select('faculty_subject.*', 'subjects.*')
            ->where(['faculty_subject.faculty_id' => 2])
            ->get();
        $quarters = DB::table('quarters')->get();
        $items = Item::get();

//        dd($quarters);

        return view('polls.create', compact('poll','questions', 'faculties', 'subjects', 'professor','quarters', 'items'));
    }

    public function getSubjects(Faculty $faculty)
    {
        $subjects = DB::table('faculty_subject')
            ->join('subjects', 'subjects.id', '=', 'faculty_subject.subject_id')
            ->select('faculty_subject.id', 'subjects.*')
            ->where(['faculty_subject.faculty_id' => $faculty->id])
            ->get();
        return with($subjects);
//        return $subjects;
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
