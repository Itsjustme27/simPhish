<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class VictimController extends Controller
{
    public function index(){
        return view('victim.index');
    }
}
