<?php

namespace App\Http\Controllers;

use App\Item;
use App\Question;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubros = Item::paginate();
        return view('rubros.index', compact('rubros'));
    }

    public function create()
    {
        $questions = Question::get();
        return view('rubros.create', compact('questions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $item = Item::create($request->all());
        $item->questions()->sync($request->get('questions'));
        return redirect()->route('rubros.index');
    }

    public function show(Item $item)
    {
        $questions = Question::whereHas('items', function ($query) use($item) {
            $query->where('item_id', $item->id);
        })->get();
        return view('rubros.show', compact('item', 'questions'));
    }

    public function edit(Item $item)
    {
        $questions = Question::get();
        return view('rubros.edit', compact('item', 'questions'));
    }

    public function update(Request $request, Item $item)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $item->update($request->all());
        $item->questions()->sync($request->get('questions'));
        return redirect()->route('rubros.show', $item->id)->with('message', 'El rubro fue actualizado exitosamente.');
    }

    public function delete(Item $item)
    {
        $questions = Question::whereHas('items', function ($query) use($item) {
            $query->where('item_id', $item->id);
        })->get();
        return view('rubros.delete', compact('item', 'questions'));
    }

    public function destroy(Item $item)
    {
        try {
            $item->delete();
        } catch (\Exception $e) {
            return redirect()->route('rubros.show', $item->id)->with('error', 'El rubro no se puede eliminar.');
        }
        return redirect()->route('rubros.index', $item->id)->with('message', 'El rubro fue eliminado exitosamente.');
    }
}
