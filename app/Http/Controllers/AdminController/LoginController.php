<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Validator;
use Hash;
use Auth;
use App\User;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì 
            return redirect('admin/home');
        } else {
            return view('admin.login');
        }

    }

    public function getReg()
    {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì 
            return redirect('admin');
        } else {
            return view('admin.register');
        }

    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 1,
            'status' => 1
        ];
        if (Auth::attempt($login)) {
            return redirect('admin/home');
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }
    public function postReg(Request $request){
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'password_validate' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
            return redirect()->back()->with('status', 'Nhập đầy đủ thông tin và pasword trên 6 kí tự');            
        }
        $input = $request->all(); 
        $input['password'] = Hash::make($input['password']);
        $input['level'] = 1;
        $input['status'] = 1;
        //dd($input);

        $user = User::create($input);
        Auth::login($user);
        return redirect('admin');
    }

    /**
     * action admincp/logout
     * @return RedirectResponse
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }
}
