<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Profile extends Component
{
    public $find_user_id;

    public $n_code,$f_name,$l_name,$mobile,$date_of_brith,$email,$address,$lw_license_number,$office_phone,$status_work
    ,$city_of_work, $gender;
    public $validate;
    public $alert_mode = 0;
    #[Layout('layouts.app')]
    public function mount($user_id)
    {
        $this->find_user_id = User::find($user_id);
    }

    public function render()
    {
        return view('livewire.profile');
    }

    public function create($id)
    {
//        $this->validate = $this->validate([
//            'f_name' => ['string', 'max:255'],
//            'date_of_brith' => ['string', 'max:255'],
//            'l_name' => ['string', 'max:255'],
//            'lw_license_number' => ['string', 'max:255'],
//            'office_phone' => ['string', 'max:255'],
//            'status_work' => ['string', 'max:255'],
//            'city_of_work' => ['string', 'max:255'],
//            'mobile' => ['digits:11', 'regex:/^09[0-9]{9}$/', 'numeric'],
//            'n_code' => ['digits:10', 'numeric'],
//            'email' => ['string', 'email'],
//        ]);
        User::find($id)->update([
            'n_code' => $this->n_code,
            'f_name' => $this->f_name,
            'l_name' => $this->l_name,
            'lw_license_number' => $this->lw_license_number,
            'office_phone' => $this->office_phone,
            'gender' => $this->gender,
            'status_work' => $this->status_work,
            'city_of_work' => $this->city_of_work,
            'mobile' => $this->mobile,
            'date_of_brith' => $this->date_of_brith,
            'email' => $this->email,
            'address' => $this->address
        ]);

        $this->alert_mode = 1;
    }

    public function close_alert()
    {
        $this->alert_mode=0;
    }
}
