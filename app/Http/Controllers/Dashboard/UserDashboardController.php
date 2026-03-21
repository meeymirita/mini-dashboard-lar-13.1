<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserDashboardController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Dashboard/User/Index');
    }

    public function dailyReport()
    {
        return Inertia::render('Dashboard/User/DailyReports');
    }

    public function weeklyReport()
    {
        return Inertia::render('Dashboard/User/WeeklyReports');
    }

    public function profile()
    {
        return Inertia::render('Dashboard/User/Profile');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
