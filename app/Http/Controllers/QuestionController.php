<?php

namespace App\Http\Controllers;

use App\Item;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function index()
    {
        $questions = Question::paginate();
        return view('questions.index', compact('questions'));
    }


    public function create()
    {
        $items = Item::get();
        return view('questions.create', compact('items'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
        ]);
        return view('questions.idex')->with('message', 'La pregunta fue creada exitosamente.');
    }

    public function show(Question $question)
    {
        $items = Item::whereHas('questions', function ($query) use($question) {
            $query->where('question_id', $question->id);
        })->get();
        return view('questions.show', compact('question', 'items'));
    }

    public function edit(Question $question)
    {
        $items = Item::get();
        return view('questions.edit', compact('question', 'items'));
    }

    public function update(Request $request, Question $question)
    {
        $this->validate($request, [
            'question' => 'required',
        ]);
        $question->update($request->all());
        $question->items()->sync($request->get('items'));
        return redirect()->route('questions.show', $question->id)->with('message', 'La pregunta se actualizo correctamente.');
    }

    public function delete(Question $question)
    {
        $items = Item::whereHas('questions', function ($query) use($question) {
            $query->where('question_id', $question->id);
        })->get();
        return view('questions.delete', compact('question', 'items'));
    }

    public function destroy(Question $question)
    {
        try {
            $question->delete();
        } catch (\Exception $e) {
            return redirect()->route('quarters.show', $question->id)
                ->with('error', 'No se puede eliminar esta pregunta.');
        }
        return redirect()->route('quarters.index')->with('message', 'La pregunta fue eliminada exitosamente.');
    }
}
