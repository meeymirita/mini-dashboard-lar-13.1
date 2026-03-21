<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login(StoreRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'auth' => 'Неверный email или пароль',
            ]);
        }

        $request->session()->regenerate();

        $user = Auth::user();
        if ($user->isAdmin()) {
            return redirect()->route('admin');
        }
        return redirect()->route('user');
    }
}
