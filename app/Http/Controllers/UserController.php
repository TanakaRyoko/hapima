<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class UserController extends Controller
{
    
    public function search()
    {
         
         return view('users/serch');
    }
    
    Public function list(Request $request)
    {   
        
        #キーワード受け取り
        $keyword = $request->input('keyword');
        
        #クエリ生成
        $query = User::query();
        
        $query->where('gender'); 
        $query->where('prefecture');
        $query->where('familysize'); 
        $query->where('working_days'); 
        $query->where('commuting_time'); 
        $query->where('partner_service_level');
        
        $posts = $query->get();
        
        return view('users.serch',['posts' =>$posts]);
        
    }
      
    
    
    
    
    public function detail()
    {   
        // ここでログイン中のユーザーの情報を取得する
        $profile_form = Auth::user();
        
        // viewファイルで使用できるように第二引数で渡す
        return view("profile.edit", ['profile_form' => $profile_form]);
    }
}

