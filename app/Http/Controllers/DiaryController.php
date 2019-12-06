<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DiaryController extends Controller
{
       public function add()
{
            return view("diaries.create");
}

        public function create(Request $request)
        {
        
            //Varidationを行う
            $this->validate($request,News::$rules);
            $news=new News;
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
            $news->fill($form);
            $news->save();
            
            
            return redirect('admin/diaries/create');
            }
        }