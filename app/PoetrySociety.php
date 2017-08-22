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
    public function add($id,$url,$name){
        $poetrysociety = new PoetrySociety();
        if (!$url){
            return json_encode(['code'=>2,'msg'=>'请插入诗词社图片']);
        }
        if ($poetrysociety->find($id)){
            return json_encode(['code'=>3,'msg'=>'该诗词社id已存在']);
        }
        $poetrysociety->id = $id;
        $poetrysociety->url = $url;
        $poetrysociety->name = $name;
        if ($poetrysociety->save()){
            return json_encode(['code'=>0,'msg'=>'成功添加一个诗词社']);
        }else{
            return json_encode(['code'=>1,'msg'=>'添加诗词社失败请稍后再试']);
        }
    }

    public function edit($id,$url,$name){
        if (!$url){
            return json_encode(['code'=>2,'msg'=>'请插入诗词社图片']);
        }
        $poetrysociety = PoetrySociety::find($id);
        $poetrysociety->url = $url;
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