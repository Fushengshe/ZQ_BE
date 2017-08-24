<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        if($request -> isMethod('GET')) {
            $validator = \Validator::make($request->input(), [
                'comment' => 'required',
                'uid' => 'required',
                'article_id' => 'required',
            ], [
                'required' => ':attribute 为必填项',
            ], [
                'comment' => '评论',
                'uid' => '父评论',
                'article_id' => '文章id'
            ]);
            if ($validator -> fails()) {
                $err_msg['code'] = 1;
                $error = $validator -> errors();
                $err_msg['msg'] = $error -> first();
                return $err_msg;
            }
            $data = $request -> all();
            $add = new Comment();
            $msg = $add -> add($data);
            return $msg;
        }
    }

    public function showComment(Request $request)
    {
        if($request -> isMethod('GET')) {
            $validator = \Validator::make($request->input(), [
                'article_id' => 'required',
            ], [
                'required' => ':attribute 为必填项',
            ], [
                'article_id' => '文章id'
            ]);
            if ($validator -> fails()) {
                $err_msg['code'] = 1;
                $error = $validator -> errors();
                $err_msg['msg'] = $error -> first();
                return $err_msg;
            }
            $data = $request -> all();
            $add = new Comment();
            $msg = $add -> show($data);
            return $msg;
        }
    }

    public function MoreComment(Request $request)
    {
        if($request -> isMethod('GET')) {
            $validator = \Validator::make($request->input(), [
                'uid' => 'required',
            ], [
                'required' => ':attribute 为必填项',
            ], [
                'uid' => '父评论id',
            ]);
            if ($validator -> fails()) {
                $err_msg['code'] = 1;
                $error = $validator -> errors();
                $err_msg['msg'] = $error -> first();
                return $err_msg;
            }
            $data = $request -> all();
            $add = new Comment();
            $msg = $add -> more($data);
            return $msg;
        }
    }

}