<?php

namespace App\Livewire\Module\Pharmacy;

use Livewire\Component;
use App\Models\Consultation;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

#[Layout('layouts.app')]
class PharmacyIndex extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';


    #[Url(as: 'q')]
    public ?string $search = '';
    
    public function render()
    {
        $pharmacy = Consultation::with('appointment')
            ->where('cure', 'NULL')
            ->paginate(5);

        return view('livewire.module.pharmacy.pharmacy-index', ['pharmacy' => $pharmacy]);
    }
}
