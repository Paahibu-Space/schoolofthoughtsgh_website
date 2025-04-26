<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $upcomingEventsCount = Event::upcoming()->count();
        $pastEventsCount = Event::past()->count();
        $totalUsers = User::count();
        $recentUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact('upcomingEventsCount', 'pastEventsCount', 'totalUsers', 'recentUsers'));
    }
}
