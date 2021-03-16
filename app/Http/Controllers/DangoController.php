<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Dango;

class DangoController extends Controller
{
    // 円グラフ表示用
    public function chart(){
        $dangos=Dango::all();
        return view('vote.dangovote', compact('dangos'));
    }

    // 投票結果をデータベースに保存用
    public function vote(Request $request){
        $favorite=Dango::where('dango', $request->dango)->first();
        $favorite->number++;
        $favorite->update();

        return back();
    }
}
