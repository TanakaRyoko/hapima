<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DiaryController extends Controller
{
       public function add()
{
            return view("views.diaries.create");
}

}