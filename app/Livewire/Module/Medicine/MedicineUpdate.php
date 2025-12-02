<?php

namespace App\Livewire\Module\Medicine;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class MedicineUpdate extends Component
{
    public function render()
    {
        return view('livewire.module.medicine.medicine-update');
    }
}
