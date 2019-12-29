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
        // \Debugbar::info($request);
        // クエリ生成
        $query = User::query();
        
        if ($query) {
            
        $query->where('gender', $request->input("gender"));
        $query->where('prefecture', $request->input("prefecture"));
        $query->where('family_size', $request->input("family_size"));
        $query->where('working_days', $request->input("working_days"));
        $query->where('commuting_time', $request->input("commuting_time"));
        $query->where('partner_service_level', $request->input("partner_service_level"));
        
        $user_form = $query->get();
        
        }else{
            abort(404);   
        }
        
        return view('users.list',['user_form' =>$user_form]);
        
    }
      
    
    
    
    
    public function detail(Request $request)
    {   
        $select_user=$request->id;
       dd($select_user);
        
        // viewファイルで使用できるように第二引数で渡す
        return view("users.detail", ['select_user' => $select_user]);
    }
}

