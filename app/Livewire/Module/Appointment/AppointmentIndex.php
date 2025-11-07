<?php

namespace App\Livewire\Module\Appointment;

use App\Models\Appointment;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class AppointmentIndex extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';


    #[Url(as: 'q')]
    public ?string $search = '';

    public function render()
    {
        $appointment = Appointment::where('firstName', 'like', '%' . $this->search . '%');
        return view('livewire.module.appointment.appointment-index',[
            'appointment' => $appointment->latest()->paginate(5),
        ]);
    }
}
