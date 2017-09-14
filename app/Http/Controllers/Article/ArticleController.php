<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Article;
use Symfony\Component\HttpKernel\EventListener\AddRequestFormatsListener;


class ArticleController extends Controller
{
    public function addArt(Request $request)
    {
        if ($request -> isMethod('GET')) {
            $validator = \Validator::make($request->input(), [
                'title' => 'required',
                'author' => 'required',
                'content' => 'required',
                'source' => 'required',
                'list_id' => 'required',
            ], [
                'required' => ':attribute 为必填项',
            ], [
                'title' => '标题',
                'author' => '责任编辑',
                'content' => '文章内容',
                'source' => '文章来源',
                'list_id' => '所属栏目',
            ]);
            if ($validator -> fails()){
                $err_msg['code'] = 1;
                $error = $validator -> errors();
                $err_msg['msg'] = $error ->first();
                return $err_msg;
            }
            $data = $request ->all();
            $add = new Article();
            $msg = $add -> add($data);
            return $msg;
        }
    }

    public function delArt(Request $request)
    {
        if($request -> isMethod('GET')) {
            $validator = \Validator::make($request->input(), [
                'id' => 'required',
            ], [
                'required' => ':attribute 为必填项',
            ], [
                'id' => '要删除的文章'
            ]);
            if ($validator -> fails()){
                $err_msg['code'] = 1;
                $error = $validator -> errors();
                $err_msg['msg'] = $error ->first();
                return $err_msg;
            }
            $data = $request ->all();
            $add = new Article();
            $msg = $add -> del($data);
            return $msg;
        }
    }

    public function showArt(Request $request)
    {
        if($request -> isMethod('GET')) {
            $validator = \Validator::make($request->input(), [
                'id' => 'required',
            ], [
                'required' => ':attribute 为必填项',
            ], [
                'id' => '文章id'
            ]);
            if ($validator -> fails()){
                $err_msg['code'] = 1;
                $error = $validator -> errors();
                $err_msg['msg'] = $error ->first();
                return $err_msg;
            }
            $data = $request ->all();
            $add = new Article();
            $msg = $add -> show($data);
            return $msg;
        }
    }

    public function editArt(Request $request)
    {
        if ($request -> isMethod('GET')) {
            $validator = \Validator::make($request->input(), [
                'title' => 'required',
                'author' => 'required',
                'content' => 'required',
                'source' => 'required',
                'list_id' => 'required',
                'id' => 'required',
            ], [
                'required' => ':attribute 为必填项',
            ], [
                'title' => '标题',
                'author' => '责任编辑',
                'content' => '文章内容',
                'source' => '文章来源',
                'list_id' => '所属栏目',
                'id' => '文章id',
            ]);
            if ($validator -> fails()){
                $err_msg['code'] = 1;
                $error = $validator -> errors();
                $err_msg['msg'] = $error ->first();
                return $err_msg;
            }
            $data = $request ->all();
            $add = new Article();
            $msg = $add -> edit($data);
            return $msg;
        }
    }

    public function showTitle(Request $request)
    {
        if($request -> isMethod('GET')) {
            $validator = \Validator::make($request->input(), [
                'list_id' => 'required',
            ], [
                'required' => ':attribute 为必填项',
            ], [
                'list_id' => '栏目'
            ]);
            if ($validator -> fails()){
                $err_msg['code'] = 1;
                $error = $validator -> errors();
                $err_msg['msg'] = $error ->first();
                return $err_msg;
            }
            $data = $request ->all();
            $add = new Article();
            $msg = $add -> showHeader($data);
            return $msg;
        }
    }

    public function showMore(Request $request)
    {
        if($request -> isMethod('GET')) {
            $validator = \Validator::make($request->input(), [
                'list_id' => 'required',
            ], [
                'required' => ':attribute 为必填项',
            ], [
                'list_id' => '栏目'
            ]);
            if ($validator -> fails()){
                $err_msg['code'] = 1;
                $error = $validator -> errors();
                $err_msg['msg'] = $error ->first();
                return $err_msg;
            }
            $data = $request ->all();
            $add = new Article();
            $msg = $add -> More($data);
            return $msg;
        }
    }

    public function SiteMovition()
    {
        $Article = new Article();
        $data['data'] = $Article -> SiteMov();
        $data['first_content'] = mb_substr($data['data'][0]['content'], 0, 18, 'utf-8');
        return response() -> json(['code' => 0, 'data'=>$data]);
    }

    public function NewsExpress()
    {
        $Article = new Article();
        $data['data'] = $Article -> NewExpress();
        $data['first_content'] = mb_substr($data['data'][0]['content'], 0, 18, 'utf-8');
        return response() -> json(['code' => 0, 'data' => $data]);
    }


}

