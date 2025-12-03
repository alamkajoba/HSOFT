<?php

namespace App\Livewire\Module\Pharmacy;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Medicine;
use App\Models\Consultation;

#[Layout('layouts.app')]
class PharmacyCreate extends Component
{
    //var for subscriber
    public $itemsSubscriber = [];
    public $medicine;

    //Var for auto complete Medicine
    public $search = '';
    public $itemsMedicine = [];
    public $selectedMedicine = [null];
    public $medicine_id;
    public $weight;

    public function searchMedicine(): void
    {
        //Looking for items
        $this->itemsMedicine = Medicine::where('firstName', 'like', '%'.$this->search.'%')
            ->orwhere('lastName', 'like', '%'.$this->search.'%')
            ->orwhere('middleName', 'like', '%'.$this->search.'%')
            ->orwhere('matricule', 'like', '%'.$this->search.'%')
            ->limit(3)
            ->get()
            ->toArray();
    }

    //Selected Medicine
    public function selectMedicine($itemId): void
    {
        // Sélectionne un élément
        $this->selectedMedicine = Medicine::find($itemId)->toArray();
        $this->search = $this->selectedMedicine['nameMedicine'].' '.$this->selectedMedicine['quantity'];
        $this->medicine_id = $this->selectedMedicine['id'];
        $this->itemsMedicine = []; // Vide les suggestions

    }

    public function mount($id)
    {
        $consultation = Consultation::findOrFail($id);
        $this->itemsSubscriber = $consultation->appointment->middleName.' '.$consultation->appointment->lastName.' '.$consultation->appointment->firstName;
        $this->medicine = $consultation['cure'];
    }

    public function render()
    {
        return view('livewire.module.pharmacy.pharmacy-create');
    }
}
