<?php

namespace App;

use Illuminate\Support\Facades\Db;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    public function add($data)
    {
        $created_at = time();
        $data['created_at'] = $created_at;
        $id = Db::table('article')
            ->insertGetId($data);
        if ($id) {
            $msg['code'] = 0;
            $msg['id'] = $id;
            $msg['msg'] = '添加文章成功';
            return $msg;
        }else{
            $err_msg['code'] = 2;
            $err_msg['msg'] = '添加文章失败，请重试';
        }

    }

    public function del($data)
    {
        $db = Db::table('article')
            ->where('id',$data['id'])
            ->delete();
        if(!$db -> isEmpty()){
            $msg['code'] = 0;
            $msg['msg'] = '删除文章成功';
        }else{
            $err_msg['code'] = 2;
            $err_msg['msg'] = '删除文章失败，请重试';
        }

    }

    public function edit($data)
    {
        $created_at = time();
        $data['created_at'] = $created_at;
        $db = Db::table('article')
            ->where('id',$data['id'])
            ->update($data);
        if ($db) {
            $msg['code'] = 0;
            $msg['id'] = $data['id'];
            $msg['msg'] = '修改文章成功';
            return $msg;
        }else{
            $err_msg['code'] = 2;
            $err_msg['msg'] = '修改文章失败，请重试';
        }
    }

    public function show($data)
    {
        $db = Db::table('article')
            ->where('id',$data['id'])
            ->get();
        if (!$db -> isEmpty()) {
            $msg['code'] = 0;
            $msg['article']['title'] = $db[0] -> title;
            $msg['article']['content'] = $db[0] -> content;
            $msg['article']['pic'] = $db[0] -> pic;
            $msg['article']['author'] = $db[0] -> author;
            $msg['article']['source'] = $db[0] -> source;
            $msg['article']['created_at'] = date('Y-m-d H:m' , $db[0] -> created_at);
            return $msg;
        } else {
            $err_msg['code'] = 2;
            $err_msg['msg'] = '操作失败，请重试';
            return $err_msg;
        }

    }

    public function showHeader($data)
    {
        $db = Db::table('article')
            ->where('list_id',$data['list_id'])
            ->orderBy('created_at','desc')
            ->select('title','id')
            ->get();
        $msg['code'] = 0;
        if(!$db -> isEmpty()){
            if (sizeof($db) > 6)
            {
                for($i = 0 ; $i < 6 ; $i++)
                {
                    $msg[$i]['title'] = $db[$i]->title;
                    $msg[$i]['id'] = $db[$i]->id;
                }
            } else {
                for($i = 0 ; $i < sizeof($db) ; $i++)
                {
                    $msg[$i]['title'] = $db[$i]->title;
                    $msg[$i]['id'] = $db[$i]->id;
                }
            }
            return $msg;
        }else{
            $err_msg['code'] = 2;
            $err_msg['msg'] = '该栏目暂未发表文章';
            return $err_msg;
        }

    }

    public function More($data)
    {
        $db = Db::table('article')
            ->where('list_id',$data['list_id'])
            ->orderBy('created_at','desc')
            ->select('title','id')
            ->get();
        $msg['code'] = 0;
        if(!$db -> isEmpty()){
            for($i = 0 ; $i < sizeof($db) ; $i++)
            {
                $msg[$i]['title'] = $db[$i]->title;
                $msg[$i]['id'] = $db[$i]->id;
            }
            return $msg;
        }else{
            $err_msg['code'] = 2;
            $err_msg['msg'] = '该栏目暂未发表文章';
            return $err_msg;
        }

    }


}