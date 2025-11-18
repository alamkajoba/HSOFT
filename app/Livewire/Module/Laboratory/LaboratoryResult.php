<?php

namespace App\Livewire\Module\Laboratory;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('app.layouts')]
class LaboratoryResult extends Component
{
    public function render()
    {
        return view('livewire.module.laboratory.laboratory-result');
    }
}
