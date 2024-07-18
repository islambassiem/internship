<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Rules\InayaEmail;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'departments' => Department::all()
        ]);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email' ,new InayaEmail],
            'national_id' => ['required', 'min:10', 'max:10'],
            'phone' => ['required', 'min:10', 'max:10'],
            'department_id' => ['required'],
            'password' => ['required', 'min:8', 'confirmed']
        ], attributes: [
            'name' => 'Name',
            'email' => 'Email',
            'national_id' => 'National ID',
            'phone' => 'Phone',
            'department_id' => 'Department',
            'password' => 'Password'
        ])->validate();

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'national_id' => $request['national_id'],
            'phone' => $request['phone'],
            'department_id' => $request['department_id'],
            'active' => '1',
            'password' => Hash::make($request['password']),
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
    }
}
