<?php

namespace App\Http\Controllers;

use App\Quarter;
use Illuminate\Http\Request;

class QuarterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quarters = Quarter::paginate();
        return view('quarters.index', compact('quarters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quarters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'init_date' => 'required',
            'end_date' => 'required',
        ]);
        Quarter::create($request->all());
        return redirect()->route('quarters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quarter  $quarter
     * @return \Illuminate\Http\Response
     */
    public function show(Quarter $quarter)
    {
        return view('quarters.show', compact('quarter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quarter  $quarter
     * @return \Illuminate\Http\Response
     */
    public function edit(Quarter $quarter)
    {
        return view('quarters.edit', compact('quarter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quarter  $quarter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quarter $quarter)
    {
        $this->validate($request, [
            'name' => 'required',
            'init_date' => 'required',
            'end_date' => 'required',
        ]);
        $quarter->update($request->all());
        return redirect()->route('quarters.show', $quarter->id)->with('info', 'El cuatrimestre se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quarter $quarter
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Quarter $quarter)
    {
        $quarter->delete();
        return redirect()->route('quarters.index')->with('info', 'El cuatrimestre fue eliminado exitosamente');
    }
}
