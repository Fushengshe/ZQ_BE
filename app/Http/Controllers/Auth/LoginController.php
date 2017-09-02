<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Cookie;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
    public function login(Request $request)
    {
//        $cookie = Cookie::forget('maoqiu2');
//        return response('Hello World')->cookie($cookie);
        if ($email = $request->email){
            if($user = User::where('email',$email)->first()){
                $password = $request->password;
                if (Hash::check($password, $user->password)){
                    return $this->setToken($email);
                }else{
                    return json_encode(['code'=>1,'msg'=>'密码错误']);
                }
            }else{
                return json_encode(['code'=>2,'msg'=>'用户名或密码错误']);
            }
        }
    }

    public function check(Request $request)
    {
        $token = $request->cookie('token');
        if($user = User::where('token',$token)->first()){
            if($user->token_exp > time()){
                $user->token_exp = time() + 7200;
                return json_encode(['code'=>90001,'msg'=>'token验证成功，time_out刷新成功，可以获取接口信息']);
            }else{
                return json_encode(['code'=>90003,'msg'=>'token长时间未使用而过期，需重新登陆']);
            }
        }else{
            return json_encode(['code'=>90002,'msg'=>'token验证出错']);
        }
    }

    public function setToken($email){
        $user = User::where('email',$email)->first();
        $token = sha1(md5($user->username . time()));
        $user->token = $token;
        $user->token_exp = time()+7200;
        if($user->save()){
            return response(json_encode(['code'=>0,'msg'=>'登录成功']))->cookie(
                'token', $token , 120
            );
        }else{
            return json_encode(['code'=>3,'msg'=>'登录失败']);
        }
    }

}
