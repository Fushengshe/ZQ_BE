<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2017/8/27
 * Time: 12:08
 */

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;
    public function email(Request $request)
    {
        $code = '';
        for ($i = 0; $i < 6; $i++) {
            $code = $code . rand(0, 9);
        }
        $data = ['email' => $request->email, 'code' => $code];

        Mail::send('emails', $data, function ($message) use ($data) {
            $message->to($data['email'])->subject('您正在重置密码，请查收验证码！');
        });
        return json_encode(['code' => 0, 'msg' => '验证码为' . $code]);
    }
}