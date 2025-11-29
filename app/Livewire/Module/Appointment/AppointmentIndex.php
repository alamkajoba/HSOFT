<?php

namespace App\Livewire\Module\Appointment;

use App\Enums\ConsultationStatusEnum;
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


    public function cancelAppointment($id)
    {
        $catch = Appointment::findOrFail($id);
        $catch->update([
            'appointmentStatus' => ConsultationStatusEnum::CANCELLED->value,
        ]);

        session()->flash('success', "Le rendez-vous consultation a été annulé.");
        return redirect()->to(route('appointment.index'));
    }

    public function render()
    {
        $appointment = Appointment::with('subscriber')
            ->whereHas('subscriber', function ($q) {
                $q->where('firstName', 'like', '%' . $this->search . '%')
                    ->orwhere('lastName', 'like', '%' . $this->search . '%')
                    ->orwhere('middleName', 'like', '%' . $this->search . '%');
            })
            ->where('appointmentStatus', ConsultationStatusEnum::PENDING->value)
            ->paginate(5);

                                        
        return view('livewire.module.appointment.appointment-index',[
            'appointment' => $appointment,
        ]);
    }
}
