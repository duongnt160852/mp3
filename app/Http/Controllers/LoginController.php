<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth as Auth;

class LoginController extends Controller
{

    function getLoginAdmin(Request $request){
    	if (!Auth::guard("admin")->check()) return view("admin/admin/login");
        return redirect('admin/home');
    }

    public function postLoginAdmin(Request $request){
        if($request->remember_me!=null) $remember=false;
        else $remember=true;
    	if (Auth::guard("admin")->attempt(["username"=>$request->username, "password"=>$request->password],$remember)){
    		return redirect('admin/home');
    	}
    	return redirect()->back()->with("thongbao","Đăng nhập thất bại");
    }
}
