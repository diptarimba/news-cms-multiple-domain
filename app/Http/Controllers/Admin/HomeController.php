<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Corporate;
use App\Models\Steganography;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $countAllUser = User::count();
        $countContent = Content::count();
        return view('page.admin-dashboard.home.index', compact('countAllUser','countContent'));
    }
}
