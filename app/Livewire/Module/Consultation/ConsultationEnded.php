<?php

namespace App\Livewire\Module\Consultation;

use App\Enums\ConsultationStatusEnum;
use App\Models\Appointment;
use App\Models\Consultation;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class ConsultationEnded extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';


    #[Url(as: 'q')]
    public ?string $search = '';

    public function render()
    {

        $consultation = Consultation::where('firstName', 'like', '%' . $this->search . '%');

        return view('livewire.module.consultation.consultation-ended',[
            'consultation' => $consultation->latest()->paginate(5),
        ]);
    }
}
