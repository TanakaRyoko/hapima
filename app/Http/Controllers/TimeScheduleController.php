<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TimeSchedule;
use Illuminate\Support\Facades\Auth; //追記した


class TimeScheduleController extends Controller
{
        public function add()
        {
            return view("timeschedule.create");
        }
        
        
        
        public function create(Request $request)
        {
            
            $user = Auth::user();
            //Varidationを行う
            $this->validate($request,TimeSchedule::$rules);
            $timeschedules=new TimeSchedule;
            $form=$request->all();
            $form['user_id'] = $user->id;
            
            //フォームから送信されてきた_tokenを削除する
            unset($form['_token']);
            
            //データベースに保存する
            $timeschedules->fill($form);
            
            $timeschedules->save();
            
            
            return redirect('timeschedules');
        }

        public function index(Request $request)
        {
            $posts = TimeSchedule::all();
            // \Debugbar::info($posts);
            return view('timeschedule.index',['posts' => $posts]);
        }
}

