<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{

    protected $table = 'article';

    public function add($data)
    {
        $created_at = time();
        $data['created_at'] = $created_at;
        $id = DB::table('article')
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
        $db = DB::table('article')
            ->where('id',$data['id'])
            ->delete();
        if(!$db -> isEmpty()){
            $msg['code'] = 0;
            $msg['msg'] = '删除文章成功';
            return $msg;
        }else{
            $err_msg['code'] = 2;
            $err_msg['msg'] = '该文章已被删除';
            return $err_msg;
        }

    }

    public function edit($data)
    {
        $created_at = time();
        $data['created_at'] = $created_at;
        $list = DB::table('lists')
            ->where('id',$data['list_id'])
            ->get();
        if(sizeof($list) != 0)
        {
            $err_msg['code'] = 2;
            $err_msg['msg'] = '目标栏目不存在，请重试';
            return $err_msg;
        }
        $db = DB::table('article')
            ->where('id',$data['id'])
            ->update($data);
        if ($db) {
            $msg['code'] = 0;
            $msg['id'] = $data['id'];
            $msg['msg'] = '修改文章成功';
            return $msg;
        }else{
            $err_msg['code'] = 3;
            $err_msg['msg'] = '修改文章失败，请重试';
            return $err_msg;
        }
    }

    public function show($data)
    {
        $db = DB::table('article')
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
        $db = DB::table('article')
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
                    $msg['title'][$i]['title'] = $db[$i]->title;
                    $msg['title'][$i]['id'] = $db[$i]->id;
                }
            } else {
                for($i = 0 ; $i < sizeof($db) ; $i++)
                {
                    $msg['title'][$i]['title'] = $db[$i]->title;
                    $msg['title'][$i]['id'] = $db[$i]->id;
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
        $db = DB::table('article')
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

    public function SiteMov()
    {
        //截取诗联大赛 大学堂 校园联盟中的文章 获取所有可能的分类id
        //增加本站动态那张图片以及上面的第一个文章的内容
        $cat_arr = [3, 4, 5];
        foreach($cat_arr as $cat_item) {
            $sons = DB::table('lists')
                ->where('uid', $cat_item)
                ->orderBy('order')
                ->select('*')
                ->get()->toArray();
            foreach($sons as $son_item) {
                if(!in_array($son_item -> id, $cat_arr)) {
                    array_push($cat_arr, (int)($son_item -> id));
                }
            }
        }

        $articles = $this -> where('list_id', $cat_arr) -> limit(7) -> get();
        return $articles;
    }

    public function NewExpress()
    {
        $cat_arr = [3];
        $sons = DB::table('lists')
            ->where('uid', 3)
            ->orderBy('order')
            ->select('*')
            ->get() -> toArray();
        foreach($sons as $son_item) {
            if(!in_array($son_item -> id, $cat_arr)) {
                array_push($cat_arr, (int)($son_item -> id));
            }
        }

        $articles = $this -> where('list_id', $cat_arr) -> limit(7) -> get();
        return $articles;
    }


}