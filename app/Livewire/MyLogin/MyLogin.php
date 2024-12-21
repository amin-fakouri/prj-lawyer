<?php

namespace App\Livewire\MyLogin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;

class MyLogin extends Component
{
    public $username;
    public $password;
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.my-login.my-login');
    }

    public function login()
    {
        $attributes = [
            'username' => $this->username,
            'password' => $this->password
        ];

        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'incorrectness' => 'اطلاعات صحیح نمی باشند!'
            ]);
        }



        if (Auth::user()->role === 'admin'){
            return redirect(URL::signedRoute('admin-dashboard'));
        }elseif (Auth::user()->role === 'lawyer'){
            return redirect(URL::signedRoute('lawyer-dashboard'));
        }elseif(Auth::user()->role === 'trainee'){
            return redirect(URL::signedRoute('trainee-dashboard'));
        }


    }
}
