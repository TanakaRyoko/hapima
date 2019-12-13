<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

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
        //  $this ->validate($request, User::$rules);
         
         //User Modelからデータを取得する
         $user=User::find($request->id);
         
         //送信されてきたフォームデータを格納する
         $profile_form= $request->all();
         
         // $user->fill($profile_form);をする前にuser_idを入れてあげる
         $profile_form['user_id'] = $user->id;
         
         unset($profile_form['_token']);
         \Debugbar::info($profile_form);
        \Debugbar::info($user);
        \Debugbar::info($profile_form["gender"]);
         $user->fill($profile_form);
         $user->fill(["gender"=>"male"]);
         $user->fill(["partner_service_level"=>$profile_form["partner_service_level"]]);
        //  $this ->validate($request, User::$rules);
         $user->save();
        
         return redirect('profile/edit');
    }
}

