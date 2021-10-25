<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function main()
    {
        return view('Back.index');
    }
    public function settings()
    {
        return view('Back.settings');
    }
    public function login()
    {
        return view('Back.login');
    }
    public function payment()
    {
        return view('Back.payment');
    }
}
