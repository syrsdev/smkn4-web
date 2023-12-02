<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function get()
    {
        return view('dashboard.dashboard')
            ->with([
                'title' => 'Dashboard',
                'active' => 'Dashboard',
                'subActive' => null,
            ]);
    }

    public function index()
    {
        return view('dashboard.dashboard.dashboard')
            ->with([
                'title' => 'Dashboard',
                'active' => 'Dashboard',
                'subActive' => null,
            ]);
    }
}
