<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class UserController extends Controller
{
    public function serch(Request $request)
    {   
        
        $cond_title =$request ->cond_title;
        // ここでログイン中のユーザーの情報を取得する
        //検索されたら結果を取得する
            $posts =users::where('title',$cond_title)->get();
        
        // viewファイルで使用できるように第二引数で渡す
        return view("profile.edit", ['profile_form' => $profile_form]);
    }
      
     
        

    public function list(Request $request)
    {
         //validationをかける
        //  $this ->validate($request, User::$rules);
         
         //User Modelからデータを取得する
         $user=User::find($request->id);
         
         //送信されてきたフォームデータを格納する
         $profile_form= $request->all();
         
         unset($profile_form['_token']);
         \Debugbar::info($profile_form);
        \Debugbar::info($user);
        \Debugbar::info($profile_form["gender"]);
         $user->fill($profile_form);
         //  $this ->validate($request, User::$rules);
         $user->save();
        
         return redirect('profile/edit');
    }
    
    public function detail()
    {   
        // ここでログイン中のユーザーの情報を取得する
        $profile_form = Auth::user();
        
        // viewファイルで使用できるように第二引数で渡す
        return view("profile.edit", ['profile_form' => $profile_form]);
    }
}

