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
        return $carousel->add(intval($request->id),$request->order,$request->file('img'));
    }

    public function edit(Request $request){
        $carousel = new Carousel;
        return $carousel->edit(intval($request->id),$request->order,$request->file('img'));
    }

    public function del(Request $request){
        $carousel = new Carousel;
        return $carousel->del(intval($request->id));
    }

    public function show(){
        $carousel = new Carousel;
        return $carousel->show();
    }

}