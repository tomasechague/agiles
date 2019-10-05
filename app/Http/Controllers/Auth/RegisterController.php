<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Profile;


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
    protected $redirectTo = '/home';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationStudentForm(){
        return view('auth.registerStudent');
    }

    public function showRegistrationTeacherForm(){
        return view('auth.registerTeacher');
    }

    public function registerStudent(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'postCode' => ['required', 'string', 'max:255'],
        ]);
        try{
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);

            Profile::create([
                'address' => $request->get('address'),
                'country' => $request->get('country'),
                'province' => $request->get('province'),
                'postalCode' => $request->get('postCode'),
                'is_teacher' => 0,
                'user_id' => $user->id,
            ]);
            DB::commit();
            $this->guard()->login($user);
            return redirect()->route('home');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('registerStudent');
        }
    }

    public function registerTeacher(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'postCode' => ['required', 'string', 'max:255'],
            'lesson' => ['required', 'string', 'max:255'],
        ]);
        try{
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);

            Profile::create([
                'address' => $request->get('address'),
                'country' => $request->get('country'),
                'province' => $request->get('province'),
                'postalCode' => $request->get('postCode'),
                'is_teacher' => 1,
                'lesson' => $request->get('lesson'),
                'user_id' => $user->id,
            ]);
            DB::commit();
            $this->guard()->login($user);
            return redirect()->route('home');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('registerStudent');
        }
    }
}
