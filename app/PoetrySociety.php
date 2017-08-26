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
    protected $table = 'poetry_societys';
    public function add($id,$order,$img,$name){
        $poetrysociety = new PoetrySociety();
        if (!$img){
            return json_encode(['code'=>2,'msg'=>'请插入诗词社图片']);
        }
        if ($poetrysociety->find($id)){
            return json_encode(['code'=>3,'msg'=>'该诗词社id已存在']);
        }
        $path = $img->storeAs('poetrysocietys', $id.'.jpg');
        $poetrysociety->id = $id;
        $poetrysociety->order = $order;
        $poetrysociety->url = 'storage/app/'.$path;
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
        $path = $img->storeAs('poetrysocietys', $id.'.jpg');
        $poetrysociety = PoetrySociety::find($id);
        $poetrysociety->order = $order;
        $poetrysociety->url = 'storage/app/'.$path;
        $poetrysociety->name = $name;
        if ($poetrysociety->save()){
            return json_encode(['code'=>0,'msg'=>'成功修改一个诗词社']);
        }else{
            return json_encode(['code'=>1,'msg'=>'修改诗词社失败请稍后再试']);
        }
    }

    public function del($id){
        $poetrysociety = PoetrySociety::find($id);
        if ($poetrysociety->delete()){
            return json_encode(['code'=>0,'msg'=>'成功删除一个诗词社']);
        }else{
            return json_encode(['code'=>1,'msg'=>'删除诗词社失败请稍后再试']);
        }
    }

    public function show(){
        if($poetrysocietys = PoetrySociety::all()){
            $i = 0;$poe['code']=0;
            foreach ($poetrysocietys as $poetrysociety){
                $poe['data'][$i]['id'] = $poetrysociety->id;
                $poe['data'][$i]['url'] = $poetrysociety->url;
                $poe['data'][$i]['name'] = $poetrysociety->name;
                $i++;
            }
            return json_encode($poe);
        }else{
            return json_encode(['code'=>1,'msg'=>'查询诗词社失败，请稍后再试']);
        }
    }

}