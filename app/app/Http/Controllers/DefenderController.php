<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;


class DefenderController extends Controller
{
    public function index() {
        return view('defender.index');
    }
}
