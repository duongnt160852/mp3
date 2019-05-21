<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth as Auth;

use Validator;

class LoginController extends Controller
{

    function getLogin(Request $request){
        if (!Auth::check()) return view("user/login");
        return redirect("/");
    }

    public function signup(Request $request){
        $validator=Validator::make($request->all(), 
            [
                "name"=>"required",
                "username"=>array('required','unique:users,username'),
                "email"=>array("required","regex:([a-zA-Z0-9!#%&\'\*\+\/=\?\^_`\{\|\}~-]((\.)*[a-zA-Z0-9!#%&\'\*\+\/=\?\^_`\{\|\}~-])*+@[a-zA-Z0-9]((-)*[a-zA-Z0-9])*((\.)*([a-zA-Z0-9]((-)*[a-zA-Z0-9])*))*)","unique:users,email"),
                "password"=>"required|confirmed",
                "password_confirmation"=>"required"
            ],  
            [
                "name.required"=>"Chưa nhập tên",
                "username.required"=>"Chưa nhập tên đăng nhập",
                "username.unique"=>"Tên đăng nhập đã tồn tại",
                "email.required"=>"Chưa nhập email",
                "email.regex"=>"Email không đúng định dạng",
                "email.unique"=>"Email đã tồn tại",
                "password.required"=>"Chưa nhập mật khẩu",
                "password.confirmed"=>"Mật khẩu không trùng khớp",
                "password_confirmation.required"=>"Chưa nhập xác nhận mật khẩu"
            ]);
        if ($validator->fails()) {
            return response()->json([
                    'error' => true,
                    'message' => $validator->errors()
                ], 200);
        }
        User::insert($request->username, $request->password, $request->email, $request->name);
        return response()->json([
                'error' => false,
                'message' => 'success'
            ], 200);
    }

    function postLogin(Request $request){
        
        if($request->remember_me!=null) $remember=false;
        else $remember=true;
        if (Auth::attempt(["username"=>$request->username, "password"=>$request->password],$remember)){
            if ($request->has('previous')) {
                return Redirect::to($request->get('previous'));
            }
            return redirect('/');
        }
        return redirect()->back()->with("thongbao","Đăng nhập thất bại");
    }

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

    public function userLogout(){
        Auth::logout();
        return redirect()->back();
    }

    function ajaxLogin(Request $request){
        if($request->input('checkbox')!=null) $remember=false;
        else $remember=true;
        if (Auth::attempt(["username"=>$request->input('username'), "password"=>$request->input('password'), "status"=>"1"],$remember)){
            return response()->json([
                    'error' => false,
                    'message' => 'success'
                ], 200);
        }
        else return response()->json([
            'error' => true,
            'message' => 'success'
        ], 200);
    }
}
