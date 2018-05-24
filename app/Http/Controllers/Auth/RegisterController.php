<?php

namespace App\Http\Controllers\Auth;

use App\Faculty;
use App\RoleUser;
use App\Student;
use App\User;
use App\Http\Controllers\Controller;
use App\UserMy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'code' => 'required|max:6|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'faculties_id',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function index()
    {
        $faculties = Faculty::get();
        return view('auth.register', compact('faculties'));
    }

    public function createTest(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|max:6|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
//        dd($request->code);
        $name = DB::table('students')->select('name')->where('student_id', $request->code)->get();
        $email = DB::table('students')->select('email')->where('student_id', $request->code)->get();
        $faculties = DB::table('students')->selectRaw('faculty')->where('student_id', $request->code)->get();
//        dd($faculties);
        $faculty_id = DB::table('faculties')->select('id')->where('name', (string) $faculties)->get();
        dd($faculty_id);
        $user = User::create([
            'code' => $request->code,
            'name' => $name,
            'email' => $email,
            'faculties_id' => $faculty_id,
            'password' => bcrypt($request->password),
        ]);
        RoleUser::create([
            'role_id' => 3,
            'user_id' => $user->id,
        ]);
        $this->guard()->login($user);
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    public function create(Request $request)
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
        RoleUser::create([
            'role_id' => 3,
            'user_id' => $user->id,
        ]);
        UserMy::create([
            'user_id' => $user->id,
        ]);
        $this->guard()->login($user);
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
