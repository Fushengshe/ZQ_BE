<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function email(Request $request)
    {
        $code = '';
        for ($i = 0; $i < 6; $i++) {
            $code = $code . rand(0, 9);
        }
        $data = ['email' => $request->email, 'code' => $code];

        Mail::send('emails', $data, function ($message) use ($data) {
            $message->to($data['email'])->subject('欢迎注册我们的网站，请查收验证码！');
        });
        return json_encode(['code' => 0, 'msg' => '验证码为' . $code]);
    }
}
