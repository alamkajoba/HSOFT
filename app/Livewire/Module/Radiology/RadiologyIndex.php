<?php

namespace App\Livewire\Module\Radiology;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('app.layouts')]
class RadiologyIndex extends Component
{
    public function render()
    {
        return view('livewire.module.radiology.radiology-index');
    }
}
