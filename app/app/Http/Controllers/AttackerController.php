<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Email;

class AttackerController extends Controller
{
    public function index() {
        return view('attacker.index');
    }
}