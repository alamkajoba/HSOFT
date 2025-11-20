<?php

namespace App\Livewire\Module\Appointment;

use App\Enums\ConsultationStatusEnum;
use App\Models\Appointment;
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
    public $subscriber_id;
    public $weight;



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
        $this->subscriber_id = $this->selectedSubscriber['id'];
        $this->itemsSubscriber = []; // Vide les suggestions

    }

    //Submit Appointment
    public function appointmentCreate()
    {
        $appointment = Appointment::create([
            'subscriber_id' => $this->subscriber_id,
            'consultationStatus' => ConsultationStatusEnum::PENDING->value,
            'weight' => $this->weight
        ]);

        session()->flash('success', "Le rendez-vous consultation a été créé avec succès.");
        return redirect()->to(route('appointment.create'));
    }


    public function render()
    {
        return view('livewire.module.appointment.appointment-create');
    }
}
