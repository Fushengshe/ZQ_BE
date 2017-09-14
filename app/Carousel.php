<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $hidden = [
        'updated_at','created_at',
    ];
    protected $table = 'carousels';
    public function add($id,$order,$img){
        if (!$img){
            return json_encode(['code'=>2,'msg'=>'请插入轮播图']);
        }
        if(Carousel::where('order',$order)->first()){
            return json_encode(['code'=>4,'msg'=>'序号'.$order.'已存在']);
        }
        $carousel = new Carousel();
        if ($carousel->where('id',$id)->first()){
            return json_encode(['code'=>3,'msg'=>'该轮播图id已存在']);
        }
        $path = $img->storeAs('carousels', uniqid().'.jpg');
        $carousel->id = $id;
        $carousel->order = $order;
        $carousel->url = 'http://www.thmaoqiu.cn/poetry/storage/app/'.$path;
        if ($carousel->save()){
            return json_encode(['code'=>0,'msg'=>'成功添加一张轮播图']);
        }else{
            return json_encode(['code'=>1,'msg'=>'添加轮播图失败请稍后再试']);
        }
    }

    public function edit($id,$order,$img){
        if (!$img){
            return json_encode(['code'=>2,'msg'=>'请插入轮播图']);
        }
        if(Carousel::where('order',$order)->first()){
            return json_encode(['code'=>4,'msg'=>'序号'.$order.'已存在']);
        }
        if (!$carousel = Carousel::where('id',$id)->first()){
            return json_encode(['code'=>5,'msg'=>'轮播图id不存在']);
        }
        $path = $img->storeAs('carousels', uniqid().'.jpg');
        $carousel->order = $order;
        $carousel->url = 'http://www.thmaoqiu.cn/poetry/storage/storage/app/'.$path;
        if ($carousel->save()){
            return json_encode(['code'=>0,'msg'=>'成功修改一张轮播图']);
        }else{
            return json_encode(['code'=>1,'msg'=>'修改轮播图失败请稍后再试']);
        }
    }

    public function del($id){
        if ($carousel = Carousel::where('id',$id)->first()){
            if($carousel->delete()){
                return json_encode(['code'=>0,'msg'=>'删除轮播图成功']);
            }else{
                return json_encode(['code'=>1,'msg'=>'删除轮播图失败，请稍后再试']);
            }
        }else{
            return json_encode(['code'=>2,'msg'=>'未找到该轮播图']);
        }
    }

    public function show(){
        if($carousels = Carousel::orderBy('order', 'asc')->get()){
            $carousel['code'] = 0;
            $carousel['data'] = $carousels;
            return $carousel;
        }else{
            return json_encode(['code'=>1,'msg'=>'查询轮播图失败，请稍后再试']);
        }
    }

}
