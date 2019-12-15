<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Diary;
use Illuminate\Support\Facades\Auth; //追記した

class DiaryController extends Controller
{
    
       public function add()
        {
            return view("diaries.create");
        }


        public function create(Request $request)
        {
            $user = Auth::user();
            
            //Varidationを行う
            $this->validate($request,Diary::$rules);
            $diaries=new Diary;
            $form=$request->all();
            $form['user_id'] = $user->id;
            
            //フォームから送信されてきた_tokenを削除する
            unset($form['_token']);
            
            //データベースに保存する
            $diaries->fill($form);
            $diaries->save();
            
            
            return redirect('diaries');//リダイレクトはURLのみ指定できる
            }
            
            
        public function index(Request $request)
        {
            $posts = Diary::all();
            // \Debugbar::info($posts);
            return view('diaries.index',['posts' => $posts]);
        }
        
        
        public function edit(Request $request)
    {
        $news = Diary::find($request->id);
        if(empty($diaries)){
            abort(404);
        }
        return view('admin.news.edit',['news_form' =>$news]);
    }
    
    public function update(Request $request)
    {
        //Validationをかける
        $this->validate($request,News::$rules);
        //News Modelからデータを取得する
        $news=News::find($request->id);
        //送信されてきたフォームデータを格納する
        $news_form =$request ->all();
        if($request ->remove =='true'){
            $news_form['image_path']=null;
        }elseif($request ->file('image')){
            $path =$request->file('image')->store('public/image');
            $news_form['image_path'] = basename($path);
        }else{
            $news_form['image_path']=$news ->image_path;
        
        }
        
        unset($news_form['_token']);
        unset($news_form['image']);
        unset($news_form['remove']);
        $news->fill($news_form)->save();
        
        $history =new History;
        $history->news_id =$news->id;
        $history->edited_at =Carbon::now();
        $history->save();
        
        return redirect('admin/news');
    }

}