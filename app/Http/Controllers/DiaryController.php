<?php

namespace はぴワーママライフ\Http\Controllers;

use はぴワーママライフ\Http\Controllers\Controller;
use Illuminate\Http\Request;
use はぴワーママライフ\Diary;

class DiaryController extends Controller
{
       public function add()
{
            return view("diaries.create");
}

        public function create(Request $request)
        {
        
            //Varidationを行う
            $this->validate($request,Diary::$rules);
            $diaries=new Diary;
            $form=$request->all();
            
            // //フォームから画像が送信されてきたら、保存して、$news->image_pathに画像のパスを保存する。
            // if(isset($form['image'])){
            //     $path=$request->file('image')->store('public/image');
            //     $news->image_path=basename($path);
            // }else{
            //     $news->image_path=null;
            // }
            //フォームから送信されてきた_tokenを削除する
            unset($form['_token']);
            //フォームから送信されてきたimageを削除する。
            // unset($form['image']);
            
            //データベースに保存する
            $diaries->fill($form);
            $diaries->save();
            
            
            return redirect('diaries/create');
            }
        public function index(Request $request)
        {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Diary::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Diary::all();
      }
      return view('diaries.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }

        }