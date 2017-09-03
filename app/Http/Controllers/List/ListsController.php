<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Lists;


class ListController extends Controller
{

    public function store(Request $request)
    {
        $lists = new Lists();
        $msg = $lists -> show();
        return view('category.store',[
            'item' => $msg['res']
        ]);

    }

    public function index()
    {
        $lists = new Lists();
        $msg = $lists -> show();
        return view('category.index',[
            'item' => $msg['res']
        ]);

    }

    public function create()
    {
        $lists = new Lists();
        $msg = $lists -> show();
        return view('category.edit',[
            'item' => $msg['res']
        ]);
    }

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
        if ($request -> isMethod('POST')) {
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
                return redirect()->back()->withErrors($validator)->withInput();
//                $err_msg['code'] = 1;
//                $error = $validator -> errors();
//                $err_msg['msg'] = $error ->first();
//                return $err_msg;
            }
            $data = $request ->all();
            $lists = new Lists();
            $msg = $lists -> add($data);
            if ($msg['code'] == 0) {
                return redirect()->back()->with('success',$msg['msg']);
            } else {
                return redirect()->back()->with('error',$msg['msg']);
            }
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
                return redirect()->back()->withErrors($validator)->withInput();
//                $err_msg['code'] = 1;
//                $error = $validator -> errors();
//                $err_msg['msg'] = $error ->first();
//                return $err_msg;
            }
            $data = $request ->all();
            $lists = new Lists();
            $msg = $lists -> edit($data);
            if ($msg['code'] == 0) {
                return redirect()->back()->with('success',$msg['msg']);
            } else {
                return redirect()->back()->with('error',$msg['msg']);
            }
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
            if ($msg['code'] == 0) {
                return redirect()->back()->with('success',$msg['msg']);
            } else {
                return redirect()->back()->with('error',$msg['msg']);
            }

        }

    }


}