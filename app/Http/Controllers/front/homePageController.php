<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homePageController extends Controller
{
    public function home(Request  $request)
    {
        return view('front.homePage.main');
    }
}
