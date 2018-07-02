<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::get();
        $roles = Role::get();
        return view('users.create', compact('faculties', 'roles'));
    }

    public function updatePass()
    {
        $users = User::get();
        for ($i = 6; $i <= count($users); $i++ ){
            $user = User::select('password')->where('id',$i)->get();
            User::where('id', $i)->update([
                'password' => bcrypt($user->password),
            ]);
        };
        return redirect()->route('users.index');
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
            'name' => 'required|string|max:255',
            'code' => 'required|max:6|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'faculties_id' => 'integer',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::create([
            'code' => $request->code,
            'name' => $request->name,
            'email' => $request->email,
            'faculties_id' => $request->faculties_id,
            'password' => bcrypt($request->password),
        ]);
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(User $user)
    {
        $faculties = Faculty::get();
        $roles = Role::get();
        return view('users.edit', compact('user', 'faculties', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, User $user)
    {
        if (empty($request->password)) {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'code' => 'required|max:6',
                'email' => 'required|email',
                'faculties_id' => 'integer',
                'roles' => 'required',
            ]);
            $user->update([
                'name' => $request->name,
                'code' => $request->code,
                'email' => $request->email,
                'faculties_id' => $request->faculties_id,
            ]);
        }
        else {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'code' => 'required|max:6',
                'email' => 'required|email',
                'faculties_id' => 'integer',
                'password' => 'string|min:6|confirmed',
                'roles' => 'required',
            ]);
            $user->update([

                'name' => $request->name,
                'code' => $request->code,
                'email' => $request->email,
                'faculties_id' => $request->faculty_id,
                'password' => bcrypt($request->password),
            ]);
        }
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('users.show', $user->id)
            ->with('info', 'The user was saved successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');
    }
}
