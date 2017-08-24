<?php

namespace App\Http\Middleware;

use Closure;

class CrossDomain
{
    public function handle ($request , Closure $next)
    {
        if (isset($_SERVER["HTTP_REFERER"])) {
            $url       = $_SERVER["HTTP_REFERER"];   //获取完整的来路URL
            $str   = str_replace("http://", "", $url);  //去掉http://
            $strdomain = explode("/", $str);               // 以“/”分开成数组
            $domain    = $strdomain[0];              //取第一个“/”以前的字符
            header('Access-Control-Allow-Methods: POST,GET,PUT,DELETE,OPTIONS');
            header("Access-Control-Allow-Credentials: true");
            header("Access-Control-Allow-Origin: *");
            header('Access-Control-Allow-Headers: token,accept,content-type,X-Requested-With');

        } else {
            header('Access-Control-Allow-Methods: POST,GET,PUT,DELETE,OPTIONS');
            header("Access-Control-Allow-Credentials: true");
            header("Access-Control-Allow-Origin: *");
            header('Access-Control-Allow-Headers: token,accept,content-type,X-Requested-With');

        }

        return $next($request);
    }
}