<?php

namespace はぴワーママライフ\Http\Controllers;

use はぴワーママライフ\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function edit()
    {
        return view("profile.edit");
    }

    public function update()
    {
        return redirect('profile/edit');
    }
}