<?php

namespace App\Livewire\Module\HomPage;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class HomePage extends Component
{
    public function render()
    {
        return view('livewire.module.hom-page.home-page');
    }
}
