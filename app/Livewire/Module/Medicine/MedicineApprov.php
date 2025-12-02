<?php

namespace App\Livewire\Module\Medicine;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Medicine;

#[Layout('layouts.app')]
class MedicineApprov extends Component
{

    //Var for auto complete Subscriber
    public $search = '';
    public $nameMedicine;
    public $itemsMedicine = [];
    public $selectedMedicine = [null];
    public $medicine_id;
    public $quantity;
    public $newQuantity;

    public function searchMedicine(): void
    {
        //Looking for items
        $this->itemsMedicine = Medicine::where('nameMedicine', 'like', '%'.$this->search.'%')
            ->orwhere('category', 'like', '%'.$this->search.'%')
            ->limit(3)
            ->get()
            ->toArray();
    }

    //Selected Medicine
    public function selectMedicine($itemId): void
    {
        // Sélectionne un élément
        $this->selectedMedicine = Medicine::find($itemId)->toArray();
        $this->search = $this->selectedMedicine['nameMedicine'].' /'.$this->selectedMedicine['category'].' / stock: '.$this->selectedMedicine['quantity'];
        $this->medicine_id = $this->selectedMedicine['id'];
        $this->nameMedicine = $this->selectedMedicine['nameMedicine'];
        $this->itemsMedicine = []; // Vide les suggestions

    }

    //Approv Medicine
    public function medicineApprov()
    {
        $approv = Medicine::findOrFail($this->medicine_id);
        $this->newQuantity = $approv->quantity + $this->quantity;
        $approv->update(
            ['quantity' => $this->newQuantity]
        );

        session()->flash('success', "Le stock ". $this->nameMedicine."  a été approvisionné avec succès.");
        return redirect()->to(route('medicine.approv'));
    }

    public function render()
    {
        return view('livewire.module.medicine.medicine-approv');
    }
}
