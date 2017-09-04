<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2017/8/22
 * Time: 17:42
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class PoetrySociety extends Model
{
    protected $hidden = [
        'updated_at','created_at',
    ];
    protected $table = 'poetry_societys';
    public function add($id,$order,$img,$name){
        if (!$img){
            return json_encode(['code'=>2,'msg'=>'请插入诗词社图片']);
        }
        if(PoetrySociety::where('order',$order)->first()){
            return json_encode(['code'=>4,'msg'=>'序号'.$order.'已存在']);
        }
        $poetrysociety = new PoetrySociety();
        if ($poetrysociety->where('id',$id)->first()){
            return json_encode(['code'=>3,'msg'=>'该诗词社id已存在']);
        }
        $path = $img->storeAs('poetrysocietys', uniqid().'.jpg');
        $poetrysociety->id = $id;
        $poetrysociety->order = $order;
        $poetrysociety->url = 'http://www.thmaoqiu.cn/poetry/storage/app/'.$path;
        $poetrysociety->name = $name;
        if ($poetrysociety->save()){
            return json_encode(['code'=>0,'msg'=>'成功添加一个诗词社']);
        }else{
            return json_encode(['code'=>1,'msg'=>'添加诗词社失败请稍后再试']);
        }
    }

    public function edit($id,$order,$img,$name){
        if (!$img){
            return json_encode(['code'=>2,'msg'=>'请插入诗词社图片']);
        }
        if(PoetrySociety::where('order',$order)->first()){
            return json_encode(['code'=>4,'msg'=>'序号'.$order.'已存在']);
        }
        if (!$poetrysociety = PoetrySociety::where('id',$id)->first()){
            return json_encode(['code'=>5,'msg'=>'诗词社id不存在']);
        }

        $path = $img->storeAs('poetrysocietys', uniqid().'.jpg');
        $poetrysociety->order = $order;
        $poetrysociety->url = 'http://www.thmaoqiu.cn/poetry/storage/app/'.$path;
        $poetrysociety->name = $name;
        if ($poetrysociety->save()){
            return json_encode(['code'=>0,'msg'=>'成功修改一个诗词社']);
        }else{
            return json_encode(['code'=>1,'msg'=>'修改诗词社失败请稍后再试']);
        }
    }

    public function del($id){
        if ($poetrysociety = PoetrySociety::where('id',$id)->first()){
            if ($poetrysociety->delete()){
                return json_encode(['code'=>0,'msg'=>'成功删除一个诗词社']);
            }else{
                return json_encode(['code'=>1,'msg'=>'删除诗词社失败请稍后再试']);
            }
        }else{
            return json_encode(['code'=>2,'msg'=>'未找到该诗词社']);
        }
    }

    public function show(){
        if($poetrysocietys = PoetrySociety::orderBy('order','asc')->get()){
            $poetrysociety['code'] = 0;
            $poetrysociety['data'] = $poetrysocietys;
            return $poetrysociety;
        }else{
            return json_encode(['code'=>1,'msg'=>'查询诗词社失败，请稍后再试']);
        }
    }

}