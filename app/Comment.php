<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function add($data)
    {
        $created_at = time();
        $data['created_at'] = $created_at;
        $name = Db::table('users')
            ->where('id',$data['user_id'])
            ->get();
        $db = DB::table('comment')
            ->insertGetId($data);
        if ($db){
            $msg['code'] = 0;
            $msg['msg'] = '评论成功';
            $msg['id'] = $db;
            $msg['user_name'] = $name -> username;
            return $msg;
        } else {
            $err_msg['code'] = 2;
            $err_msg['msg'] = '评论失败，请重试';
            return $err_msg;
        }


    }

    public function show($data)
    {
        $comments = DB::table('comment')
            ->where( 'uid' , 0 )
            ->where('article_id',$data['article_id'])
            ->orderBy('created_at','desc')
            ->get();
        $res = array();
        if (!$comments -> isEmpty())
        {
            for ($i = 0 ; $i < sizeof($comments) ; $i++)
            {
                $name = Db::table('users')
                    ->where('id',( $comments[$i] -> user_id ))
                    ->get();
                if(!$name -> isEmpty()){
                    $res[$i]['user_name'] = $name[0] -> username;
                }else{
                    $res[$i]['user_name'] = '匿名用户';
                }
                $res[$i]['comment'] = $comments[$i] -> comment;
                $res[$i]['created_at'] = date('Y-m-d H:m',($comments[$i] -> created_at));
                $res[$i]['id'] = $comments[$i] -> id;
                $comment = DB::table('comment')
                    ->where('uid' , ($comments[$i] -> id))
                    ->orderBy('created_at','desc')
                    ->get();
                if (sizeof($comment) > 2) {
                    for($j = 0 ; $j < 2 ; $j++)
                    {
                        $name1 = Db::table('users')
                            ->where('id',( $comments[$j] -> user_id ))
                            ->get();
                        if(!$name1 -> isEmpty()){
                            $res[$i]['childComment'][$j]['user_name'] = $name1[0] -> username;
                        }else{
                            $res[$i]['user_name'] = '匿名用户';
                        }
                        $res[$i]['childComment'][$j]['comment'] = $comment[$j] -> comment;
                        $res[$i]['childComment'][$j]['id'] = $comment[$j] -> id;
                        $res[$i]['childComment'][$j]['created_at'] = date('Y-m-d H:m',($comment[$j] -> created_at));
                    }
                } else {
                    for($j = 0 ; $j < sizeof($comment) ; $j++)
                    {
                        $name2 = Db::table('users')
                            ->where('id',( $comments[$j] -> user_id ))
                            ->get();
                        if(!$name2 -> isEmpty()){
                            $res[$i]['childComment'][$j]['user_name'] = $name2[0] -> username;
                        }else{
                            $res[$i]['user_name'] = '匿名用户';
                        }
                        $res[$i]['childComment'][$j]['comment'] = $comment[$j] -> comment;
                        $res[$i]['childComment'][$j]['id'] = $comment[$j] -> id;
                        $res[$i]['childComment'][$j]['created_at'] = date('Y-m-d H:m',($comment[$j] -> created_at));
                    }
                }
            }
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
        $db = DB::table('comment')
            ->where('uid',$data['uid'])
            ->orderBy('created_at','desc')
            ->get();
        if (!$db -> isEmpty()) {
            for($i = 0 ; $i < sizeof($db) ; $i++){
                $name = Db::table('users')
                    ->where('id',( $db[$i] -> user_id ))
                    ->get();
                if(!$name -> isEmpty()){
                    $res[$i]['user_name'] = $name[0] -> username;
                }else{
                    $res[$i]['user_name'] = '匿名用户';
                }
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
