<?php
namespace App\Http\Controllers\Dashboard;

use Inertia\Inertia;

class AdminDashboardController extends \App\Http\Controllers\Controller
{

    public function index(): \Inertia\Response
    {
        return Inertia::render('Dashboard/Admin/Index');
    }
}
