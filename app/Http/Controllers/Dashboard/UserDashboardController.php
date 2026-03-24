<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserDashboardController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Dashboard/User/Index');
    }

    public function store(StoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        foreach ($request->validated()['tasks'] as $task) {
            Review::query()->create([
                'user_id' => auth()->id(),
                'title' => $task['title'],
                'description' => $task['description'],
                'time' => $task['time'],
            ]);
        }

        return back()->with('success', 'Report created');
    }

    public function dailyReport()
    {
        return Inertia::render('Dashboard/User/DailyReports', [
            'reviews' => Auth::user()->reviews()->latest()->paginate(10),
        ]);
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
