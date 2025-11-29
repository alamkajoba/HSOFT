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
class LaboratoryIndex extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';


    #[Url(as: 'q')]
    public ?string $search = '';

    public function render()
    {
        $lab = Laboratoty::where('laboStatus', ConsultationStatusEnum::PENDING->value)
            ->paginate(5);

        return view('livewire.module.laboratory.laboratory-index',[
            'lab' => $lab,
        ]);
    }
}
