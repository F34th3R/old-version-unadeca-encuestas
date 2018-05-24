<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\RoleUser;
use App\User;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function test()
    {
        return view('users.create');
    }

    public function create()
    {
        $faculties = Faculty::get();
        $roles = Role::get();
        return view('users.create', compact('faculties', 'roles'));
    }

    public function updatePass()
    {
        $users = DB::table('users')->get();

        for ($i = 6; $i <= count($users); $i++ ){
            $user = DB::table('users')->select('password')->where('id', $i)->get();
            dd($user);
            DB::table('users')->where('id', $i)->update([
                'password' => bcrypt($user->password),
            ]);
        };
        return redirect()->route('users.index');
//        DB::table('users')->where('id')->update([
//            'password' => bcrypt($users->password),
//        ]);
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
//        $this->validate($request, [
//            'name' => 'required|string|max:255',
//            'code' => 'required|max:6|unique:users',
//            'email' => 'required|string|email|max:255|unique:users',
//            'faculties_id' => 'integer',
//            'password' => 'string|min:6|confirmed',
//            'roles' => 'required',
//        ]);

        if (empty($request->password)) {
            $user->update([
                'name' => $request->name,
                'code' => $request->code,
                'email' => $request->email,
                'faculties_id' => $request->faculties_id,
            ]);
        }
        else {
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
        $user = User::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');
    }
}
