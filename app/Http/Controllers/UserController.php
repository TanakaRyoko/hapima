<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Collective\Html\HtmlServiceProvider;
use App\User;

class UserController extends Controller
{
    
    public function search(Request $request)
    {
        //  $user_form = User::all();
         return view('users/search');
    }
    
    Public function list(Request $request)
    {   
        
        // クエリ生成
        $query = User::query();
      \Debugbar::info($query);
        if ($query) {
            
        $query->where('gender'); 
        $query->where('prefecture');
        $query->where('family_size'); 
        $query->where('working_days'); 
        $query->where('commuting_time'); 
        $query->where('partner_service_level');
        \Debugbar($query);
        $user_form = $query->get();
        }else{
            abort(404);   
        }
        return view('users.list',['user_form' =>$user_form]);
        
    }
      
    
    
    
    
    public function detail()
    {   
        // ここでログイン中のユーザーの情報を取得する
        $user_form = Auth::user();
        
        // viewファイルで使用できるように第二引数で渡す
        return view("user.detail", ['user_form' => $user_form]);
    }
}

