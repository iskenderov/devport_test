<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
