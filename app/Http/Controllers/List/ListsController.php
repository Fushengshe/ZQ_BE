<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Lists;


class ListController extends Controller
{
    public function showLists(Request $request)
    {
        if ($request -> isMethod('GET'))
        {
            $lists = new Lists();
            $msg = $lists -> show();
            return $msg;
        }

    }

    public function addLists(Request $request)
    {
        if ($request -> isMethod('GET')) {
            $validator = \Validator::make($request->input(), [
                'column' => 'required',
                'url' => 'required',
                'order' => 'required|integer',
                'uid' => 'required|integer',
            ], [
                'required' => ':attribute 为必填项',
                'integer' => ':attribute 必须为整数',
            ], [
                'column' => '栏目名',
                'url' => '栏目地址',
                'order' => '栏目位置',
                'uid' => '父级栏目'
            ]);
            if ($validator -> fails()){
                $err_msg['code'] = 1;
                $error = $validator -> errors();
                $err_msg['msg'] = $error ->first();
                return $err_msg;
            }
            $data = $request ->all();
            $lists = new Lists();
            $msg = $lists -> add($data);
            return $msg;
        }

    }

    public function editLists(Request $request)
    {
        if ($request -> isMethod('GET')) {
            $validator = \Validator::make($request->input(), [
                'name' => 'required',
                'url' => 'required',
                'id' => 'required|integer'
            ], [
                'required' => ':attribute 为必填项',
                'integer' => ':attribute 必须为整数'
            ], [
                'name' => '栏目名',
                'url' => '栏目地址',
                'id' => '栏目id'
            ]);
            if ($validator -> fails()){
                $err_msg['code'] = 1;
                $error = $validator -> errors();
                $err_msg['msg'] = $error ->first();
                return $err_msg;
            }
            $data = $request ->all();
            $lists = new Lists();
            $msg = $lists -> edit($data);
            return $msg;
        }


    }

    public function delLists(Request $request)
    {
        if ($request -> isMethod('GET')) {
            $validator = \Validator::make($request->input(), [
                'id' => 'required|integer',
            ], [
                'required' => ':attribute 为必填项',
                'integer' => ':attribute 必须为整数',
            ], [
                'id' => '栏目'
            ]);
            if ($validator -> fails()){
                $err_msg['code'] = 1;
                $error = $validator -> errors();
                $err_msg['msg'] = $error ->first();
                return $err_msg;
            }
            $data = $request ->all();
            $lists = new Lists();
            $msg = $lists -> del($data);
            return $msg;
        }

    }


}