<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreRequest;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
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
            'reviews' => Auth::user()->reviews()->latest()->paginate(19),
        ]);
    }

    // "2026-03-23 00:00:00" // app\Http\Controllers\Dashboard\UserDashboardController.php:46 понедельник
    // "2026-03-29 23:59:59" // app\Http\Controllers\Dashboard\UserDashboardController.php:46 воскресенье
    //https://sky.pro/wiki/sql/ispolzovanie-operatora-between-v-laravel-eloquent-primery/   whereBetween !
    // Фильтрация предметов, масса которых составляет от 10 г до 30 г.                      whereBetween !
    public function weeklyReport(Request $request)
    {
        $user = Auth::user();

        // активная дата
        $date = $request->date
            ? Carbon::parse($request->date)
            : Carbon::now();

        $startOfWeek = $date->copy()->startOfWeek();
        $endOfWeek = $date->copy()->endOfWeek();

        // записи выбранной недели
        $reviews = $user->reviews()
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->orderBy('created_at')
            ->get();

        /**
         * 🔥 получаем ВСЕ недели где есть записи
         */
        $weeks = $user->reviews()
            ->select(DB::raw('DATE(created_at) as date'))
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->date)
                    ->startOfWeek()
                    ->format('Y-m-d');
            })
            ->keys()
            ->map(function ($weekStart) {
                $start = Carbon::parse($weekStart);
                return [
                    'start' => $start->format('Y-m-d'),
                    'end' => $start->copy()->endOfWeek()->format('Y-m-d'),
                ];
            })
            ->values();

        return Inertia::render('Dashboard/User/WeeklyReports', [
            'weeklyReport' => [
                'startOfWeek' => $startOfWeek->format('Y-m-d'),
                'endOfWeek' => $endOfWeek->format('Y-m-d'),
                'items' => $reviews,
            ],
            'weeks' => $weeks,
        ]);
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
