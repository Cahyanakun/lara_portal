<?php

namespace App\Http\Controllers\super;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return view('super.chat.home');
    }
}
