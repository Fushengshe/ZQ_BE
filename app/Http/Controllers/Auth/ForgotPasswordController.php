<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\User;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function forgotPassword(Request $request)
    {
        $email = $request->email;
        if (!$user = User::where('email',$email)->first()){
            return json_encode(['code'=>2,'msg'=>'邮箱不存在']);
        }
        $user->password = $request->newpassword;
        if ($user->save()) {
            return json_encode(['code' => 0, 'msg' => '修改密码成功']);
        } else {
            return json_encode(['code' => 1, 'msg' => '修改密码失败，请稍后再试']);
        }
    }

}
