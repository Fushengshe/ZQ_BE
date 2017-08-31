<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2017/8/22
 * Time: 18:07
 */

namespace App\Http\Controllers;
use App\PoetrySociety;
use Illuminate\Http\Request;

class PoetrySocietyController
{
    public function add(Request $request){
        $poetrysociety = new PoetrySociety();
        return $poetrysociety->add(intval($request->id),$request->order,$request->file('img'),$request->name);
    }

    public function edit(Request $request){
        $poetrysociety = new PoetrySociety();
        return $poetrysociety->edit(intval($request->id),$request->order,$request->file('img'),$request->name);
    }

    public function del(Request $request){
        $poetrysociety = new PoetrySociety();
        return $poetrysociety->del(intval($request->id));
    }

    public function show(){
        $poetrysociety = new PoetrySociety();
        return $poetrysociety->show();
    }
}