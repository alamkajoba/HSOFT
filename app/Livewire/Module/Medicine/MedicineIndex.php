<?php

namespace App\Livewire\Module\Medicine;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Medicine;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

#[Layout('layouts.app')]
class MedicineIndex extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';


    #[Url(as: 'q')]
    public ?string $search = '';

    
    public function render()
    {
        $medicine = Medicine::where('nameMedicine', 'like', '%' . $this->search . '%')
                    ->orwhere('category', 'like', '%' . $this->search . '%')
                    ->paginate(5);

        return view('livewire.module.medicine.medicine-index', ['medicine' => $medicine]);
    }
}
