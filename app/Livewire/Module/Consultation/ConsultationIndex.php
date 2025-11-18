<?php

namespace App\Livewire\Module\Consultation;

use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class ConsultationIndex extends Component
{
    public function render()
    {
        return view('livewire.module.consultation.consultation-index');
    }
}
