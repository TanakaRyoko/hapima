<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Diary;
use Illuminate\Support\Facades\Auth; //追記した


class TimeScheduleController extends Controller
{
        public function add()
        {
            return view("timeschedule.create");
        }
}