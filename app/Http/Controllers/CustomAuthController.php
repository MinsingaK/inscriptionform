<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\registerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function login(Request $request) {
        return view("auth.login");
    }

    public function registration(Request $request) {
        return view("auth.registration");
    }

    public function registerUser(registerRequest $request) {
        $request->validated();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();

        if($res){
            return back()->with('success', 'You have registred successfully ! 😉🙂');
        }else{
            return back()->with('fail', 'Something wrong ! 😢😬');
        }
    }

    public function loginUser(loginRequest $request) {

        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail', "Password not matches.");
            }
        }else{
            return back()->with('fail', "This email is not registered.");
            }

    }

    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view("dashboard", compact('data'));
    }

    public function logout() {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
