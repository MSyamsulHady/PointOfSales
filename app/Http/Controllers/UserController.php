<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showdata()
    {
        $showUser = DB::table('users')->get();
        return view('user.index', compact('showUser'));
    }
}
