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
            $diaries= Diary::find($request->id);
            // if(empty($diaries)){
            //     abort(404);
            // }
            \Debugbar::info($diaries);
            return view('diaries.edit',['diaries_form' =>$diaries]);
        }
    
        public function update(Request $request)
        {
            //Validationをかける
            $this->validate($request,Diary::$rules);
            //Diary Modelからデータを取得する
            $diaries=Diary::find($request->id);
            //送信されてきたフォームデータを格納する
            $diaries_form =$request ->all();
            unset($diaries_form['_token']);
            $diaries->fill($diaries_form)->save();
            
            return redirect('diaries');
        }
        
        public function delete(Request $request)
        {
            //該当するDiary Modelを取得
            $diaries=Diary::find($request->id);
            
            //削除する
            $diaries->delete();
            return redirect('diaries');
            
        }
        
        // public function detail($user_id)
        // {
        //     dd($user_id);
        //     $diary=Diary::where('id',$id)->get();
        //     return view('diaries.detail',['diary' => $diary]);
        // }

}