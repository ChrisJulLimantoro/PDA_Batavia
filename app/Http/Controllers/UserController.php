<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $model)
    {
        parent::__construct( $model);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->getAll($request->all());
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $checkE = $this->model
        ->where('email', $credentials['email'])
        ->first();
        if (!$checkE) {
            return redirect()->back()->with("error", "Email not found!")->withInput();
        }

        if ($checkE && !Hash::check($credentials['password'], $checkE->password)) {
            return redirect()->back()->with("error", "Invalid Password!")->withInput();
        }

        // Authentication passed...
        // Set Session to be logged in with the user_id
        $request->session()->put('user_id', $checkE->id);
        $request->session()->put('user_name', $checkE->name);
        return redirect()->intended(route('order.add'));
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('home');
    }
}
