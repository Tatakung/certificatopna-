<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    // protected $redirectTo = '/register'; //หลังจากที่ลงทะเบียนเสร็จ  

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('auth');
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
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'numberid' => ['nullable', 'integer', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $level = isset($data['level']) ? $data['level'] : null;
        $password = isset($data['numberid']) ? $data['numberid'] : Str::random(8); // ถ้าไม่มี numberid ให้ใช้รหัสผ่านแบบสุ่ม
        return User::create([
            'name' => $data['name'],
            'numberid' => $data['numberid'],
            'password' => Hash::make($password),
            'is_admin' => '0',
            'prefix' => $data['prefix'],
            'lname' => $data['lname'],
            'position' => $data['position'],
            'level' => $level, // ใช้ตัวแปร $level ที่เตรียมไว้
            'department' => $data['department'], //สังกัด
            'section' => isset($data['section']) && !empty($data['section']) ? $data['section'] : null,
            'division' => isset($data['division']) && !empty($data['division']) ? $data['division'] : null,
            'phone_number' => $data['phone_number'], //เบอร์ติดต่อ
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    public function updateuser(HttpRequest $request, $id)
    {
        $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string|',
            'position' => 'required|string',
        ]);
        $update = User::find($id);
        $update->name = $request->input('firstName');
        $update->lname = $request->input('lastName');
        $update->position = $request->input('position');
        $update->level = $request->input('level');
        $update->department = $request->input('department');
        $update->section = $request->input('section');
        $update->division = $request->input('division');
        $update->phone_number = $request->input('phone_number');
        $update->save();
        return redirect()->back()->with('success','ข้อมูลอัพเดตแล้ว');
    }
}
