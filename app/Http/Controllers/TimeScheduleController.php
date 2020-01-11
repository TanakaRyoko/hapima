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


        public function edit(Request $request)
        {
            $timeschedules =TimeSchedule::find($request->id);
            if(empty($timeschedules)){
                abort(404);
            }
            
            return view('timeschedule.edit',['timeschedule_form' => $timeschedules]);
            
        }





        public function delete(Request $request)
    
        {    //該当するNews Modelを取得
            $timeschedules=TimeSchedule::find($request->id);
            
            //削除する
            $timeschedules->delete();
            return redirect('timeschedules');
        }
        
        public function update(Request $request)
        {
            
            
            //Varidationを行う
            $this->validate($request,TimeSchedule::$rules);
            $timeschedules=TimeSchedule::find($request->id);
            
            $timeschedules_form=$request->all();
            dd($timeschedules_form);
            
            
            //フォームから送信されてきた_tokenを削除する
            unset($timeschedules_form['_token']);
            
            //データベースに保存する
            $timeschedules->fill($timeschedules_form->all());
            $timeschedules->save();
            return redirect('timeschedules');
        }

}

