<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AttackerController extends Controller
{
    public function index() {
        return view('attacker.index');
    }
}
