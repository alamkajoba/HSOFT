<?php

namespace App\Livewire\Module\Appointment;

use App\Models\Subscriber;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class AppointmentCreate extends Component
{

    //Var for auto complete Subscriber
    public $search = '';
    public $itemsSubscriber = [];
    public $selectedSubscriber = [null];
    public $subscriberId;



    public function searchSubscriber(): void
    {
        //Looking for items
        $this->itemsSubscriber = Subscriber::where('firstName', 'like', '%'.$this->search.'%')
            ->orwhere('lastName', 'like', '%'.$this->search.'%')
            ->orwhere('middleName', 'like', '%'.$this->search.'%')
            ->orwhere('matricule', 'like', '%'.$this->search.'%')
            ->limit(3)
            ->get()
            ->toArray();
    }

    //Selected subscriber
    public function selectSubscriber($itemId): void
    {
        // Sélectionne un élément
        $this->selectedSubscriber = Subscriber::find($itemId)->toArray();
        $this->search = $this->selectedSubscriber['middleName'].' '.$this->selectedSubscriber['lastName'].' '.$this->selectedSubscriber['firstName'];
        $this->subscriberId = $this->selectedSubscriber['id'];
        $this->itemsSubscriber = []; // Vide les suggestions

    }


    public function render()
    {
        return view('livewire.module.appointment.appointment-create');
    }
}
