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
            
            
            return redirect('diaries/create');//リダイレクトはURLのみ指定できる
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