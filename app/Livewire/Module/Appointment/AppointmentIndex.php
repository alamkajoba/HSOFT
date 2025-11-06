<?php

namespace App\Livewire\Module\Appointment;

use App\Models\Subscriber;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class AppointmentIndex extends Component
{


    public function render()
    {
        return view('livewire.module.appointment.appointment-index');
    }
}
