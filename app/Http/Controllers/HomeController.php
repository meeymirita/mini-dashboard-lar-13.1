<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Laravel\Prompts\Concerns\Events;

class HomeController extends Controller
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Home');
    }
}
