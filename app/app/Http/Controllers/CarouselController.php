<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2017/8/21
 * Time: 19:14
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Carousel;

class CarouselController extends Controller
{
    public function add(Request $request){
        $carousel = new Carousel;
        if (!$request->url){
            return json_encode(['code'=>2,'msg'=>'请插入轮播图']);
        }
        if ($carousel->find($request->id)){
            return json_encode(['code'=>3,'msg'=>'该轮播图id已存在']);
        }
        $carousel->id = $request->id;
        intval($request->id);
        $carousel->url = $request->url;
        if ($carousel->save()){
            return json_encode(['code'=>0,'msg'=>'成功添加一张轮播图']);
        }else{
            return json_encode(['code'=>1,'msg'=>'添加轮播图失败请稍后再试']);
        }
    }

    public function edit(Request $request){
        intval($request->id);
        $carousel = Carousel::find($request->id);

        if (!$request->url){
            return json_encode(['code'=>2,'msg'=>'请插入轮播图']);
        }

        $carousel->url = $request->url;
        if ($carousel->save()){
            return json_encode(['code'=>0,'msg'=>'成功修改一张轮播图']);
        }else{
            return json_encode(['code'=>1,'msg'=>'修改轮播图失败请稍后再试']);
        }
    }

    public function del(Request $request){
        intval($request->id);
        $carousel = Carousel::find($request->id);
        if($carousel->delete()){
            return json_encode(['code'=>0,'msg'=>'删除轮播图成功']);
        }else{
            return json_encode(['code'=>1,'msg'=>'删除轮播图失败，请稍后再试']);
        }
    }

    public function show(Request $request){
        intval($request->id);
        if( $carousel = Carousel::find($request->id)){
            return json_encode(['code'=>0,'id'=>$carousel->id,'url'=>$carousel->url]);
        }else{
            return json_encode(['code'=>1,'msg'=>'查询失败，请稍后再试']);
        }


    }

}