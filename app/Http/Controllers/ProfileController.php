<?php

namespace hapima\Http\Controllers;

use hapima\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use hapima\User;

class ProfileController extends Controller
{
    public function edit()
    {   
        // ここでログイン中のユーザーの情報を取得する
        $profile_form = Auth::user();
        
        // viewファイルで使用できるように第二引数で渡す
        return view("profile.edit", ['profile_form' => $profile_form]);
    }
      
     
        

    public function update(Request $request)
    {
         //validationをかける
         $this ->validate($request, User::$rules);
         //User Modelからデータを取得する
         $user=User::find($request->id);
         //送信されてきたフォームデータを格納する
         $profile_form= $request->all();
         
         unset($profile_form['_token']);
         
         $user->fill($profile_form)->save();
     
         return redirect('profile/edit');
    }
}

