<?php

namespace App\Livewire\Module\Consultation;

use App\Enums\ConsultationStatusEnum;
use App\Models\Appointment;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class ConsultationCancelled extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';


    #[Url(as: 'q')]
    public ?string $search = '';

    public function render()
    {

        $consultation = Appointment::with(['subscriber', 'consultation'])
            //Search in subscribers
            ->whereHas('subscriber', function ($q) {
                $q->where('firstName', 'like', '%' . $this->search . '%')
                    ->orwhere('lastName', 'like', '%' . $this->search . '%')
                    ->orwhere('middleName', 'like', '%' . $this->search . '%');
            })
            ->where('appointmentStatus', ConsultationStatusEnum::CANCELLED->value)
            ->paginate(5);

        return view('livewire.module.consultation.consultation-cancelled',[
            'consultation' => $consultation,
        ]);
    }
}
