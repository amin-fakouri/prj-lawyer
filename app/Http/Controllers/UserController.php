<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\NCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livewire.my-login.my-login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        $attributes = request()->validate([
            'username' => ['required', 'string', 'min:3', 'max:255'],
            'password' => ['required', 'string', Password::min(6)]
        ]);

        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'incorrectness' => 'اطلاعات صحیح نمی باشند!'
            ]);
        }
        request()->session()->regenerate();

        if (Auth::user()->role === 'admin'){
            return redirect()->route('admin-dashboard');
        }elseif (Auth::user()->role === 'lawyer'){
            return redirect()->route('lawyer-dashboard');
        }elseif(Auth::user()->role === 'trainee'){
            return redirect()->route('trainee-dashboard');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
