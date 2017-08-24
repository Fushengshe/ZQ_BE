<?php

namespace App;

use Illuminate\Support\Facades\Db;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function add($data)
    {
        $created_at = time();
        $data['created_at'] = $created_at;
        $db = Db::table('comment')
            ->insertGetId($data);
        if (!$db -> isEmpty()){
            $msg['code'] = 0;
            $msg['msg'] = '评论成功';
            $msg['id'] = $db;
            return $msg;
        } else {
            $err_msg['code'] = 2;
            $err_msg['msg'] = '评论失败，请重试';
            return $err_msg;
        }


    }

    public function show($data)
    {
        $comments = Db::table('comment')
            ->where( 'uid' , 0 )
            ->where('article_id',$data['article_id'])
            ->orderBy('created_at')
            ->get();
        if (!$comments -> isEmpty())
        {
            for ($i = 0 ; $i < sizeof($comments) ; $i++)
            {
                $res[$i]['comment'] = $comments[$i] -> comment;
                $res[$i]['created_at'] = date('Y-m-d H:m',($comments[$i] -> created_at));
                $res[$i]['id'] = $comments[$i] -> id;
                $comment = Db::table('comment')
                    ->where('uid' , ($comments[$i] -> id))
                    ->get();
                if(!$comment -> isEmpty()){
                    if (sizeof($comment) > 2) {
                        for($j = 0 ; $j < 2 ; $j++)
                        {
                            $res[$i]['childComment'][$j]['comment'] = $comment[$j] -> comment;
                            $res[$i]['childComment'][$j]['id'] = $comment[$j] -> id;
                            $res[$i]['childComment'][$j]['created_at'] = $comment[$j] -> created_at;
                        }
                    } else {
                        for($j = 0 ; $j < sizeof($comment) ; $j++)
                        {
                            $res[$i]['childComment'][$j]['comment'] = $comment[$j] -> comment;
                            $res[$i]['childComment'][$j]['id'] = $comment[$j] -> id;
                            $res[$i]['childComment'][$j]['created_at'] = $comment[$j] -> created_at;
                        }
                    }
                }
            }
            return ;
            $msg['code'] = 0;
            $msg['msg'] = $res;
            return $msg;
        } else {
            $ere_msg['code'] = 2;
            $ere_msg['msg'] = '暂无评论';
            return $ere_msg;
        }


    }

    public function more($data)
    {
        $db = Db::table('comment')
            ->where('uid',$data['uid'])
            ->get();
        if (!$db -> isEmpty()) {
            for($i = 0 ; $i < sizeof($db) ; $i++){
                $res[$i]['comment'] = $db[$i] -> comment;
                $res[$i]['id'] = $db[$i] -> id;
            }
            $msg['code'] = 0;
            $msg['msg'] = $res;
            return $msg;
        } else {
            $ere_msg['code'] = 2;
            $ere_msg['msg'] = '操作失败，请重试';
            return $ere_msg;
        }
    }


}