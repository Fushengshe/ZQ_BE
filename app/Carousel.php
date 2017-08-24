<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $table = 'carousels';
    public function add($id,$url){
        $carousel = new Carousel();
        if (!$url){
            return json_encode(['code'=>2,'msg'=>'请插入轮播图']);
        }
        if ($carousel->find($id)){
            return json_encode(['code'=>3,'msg'=>'该轮播图id已存在']);
        }
        $carousel->id = $id;
        $carousel->url = $url;
        if ($carousel->save()){
            return json_encode(['code'=>0,'msg'=>'成功添加一张轮播图']);
        }else{
            return json_encode(['code'=>1,'msg'=>'添加轮播图失败请稍后再试']);
        }
    }

    public function edit($id,$url){
        if (!$url){
            return json_encode(['code'=>2,'msg'=>'请插入轮播图']);
        }
        $carousel = Carousel::find($id);
        $carousel->url = $url;
        if ($carousel->save()){
            return json_encode(['code'=>0,'msg'=>'成功修改一张轮播图']);
        }else{
            return json_encode(['code'=>1,'msg'=>'修改轮播图失败请稍后再试']);
        }
    }

    public function del($id){
        $carousel = Carousel::find($id);
        if($carousel->delete()){
            return json_encode(['code'=>0,'msg'=>'删除轮播图成功']);
        }else{
            return json_encode(['code'=>1,'msg'=>'删除轮播图失败，请稍后再试']);
        }
    }

    public function show(){
        if($carousels = Carousel::all()){
            $i = 0;$car['code']=0;
            foreach ($carousels as $carousel){
                $car['data'][$i]['id'] = $carousel->id;
                $car['data'][$i]['url'] = $carousel->url;
                $i++;
            }
            return json_encode($car);
        }else{
            return json_encode(['code'=>1,'msg'=>'查询轮播图失败，请稍后再试']);
        }
    }

}
