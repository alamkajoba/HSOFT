<?php

namespace App\Livewire\Module\Laboratory;

use App\Enums\ConsultationStatusEnum;
use App\Models\Consultation;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class LaboratoryEnded extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';


    #[Url(as: 'q')]
    public ?string $search = '';

    public function render()
    {
        $lab = Consultation::where('firstName', 'like', '%' . $this->search . '%')
                                    ->where('LabExamStatusEnum',ConsultationStatusEnum::DONE->value);
        return view('livewire.module.laboratory.laboratory-ended',[
            'lab' => $lab->paginate(5),
        ]);
    }
}
