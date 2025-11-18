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

        $appointment = Appointment::where('firstName', 'like', '%' . $this->search . '%')
                                        ->where('consultationStatus', ConsultationStatusEnum::CANCELLED->value);

        return view('livewire.module.consultation.consultation-cancelled',[
            'appointment' => $appointment->latest()->paginate(5),
        ]);
    }
}
