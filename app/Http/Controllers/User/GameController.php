<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function penjumlahan()
    {
        return view('components.permainan.penjumlahan');
    }
}
