<?php

namespace App\Livewire\Dashboards;

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TraineDashboard extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.dashboards.traine-dashboard');
    }

    public function logout(Logout $logout): void
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirectRoute('welcome');
    }
}
