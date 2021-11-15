<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class pageController extends Controller
{
    public function index() {
        return view('authentication/login');
    }
}
