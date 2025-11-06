<?php

namespace App\Livewire\Module\Subscriber;

use App\Enums\GenderEnum;
use App\Enums\TypeEnum;
use App\Models\Subscriber;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class SubscriberUpdate extends Component
{

    public $sub;

    public $firstName;
    public $middleName;
    public $lastName;
    public $gender;
    public $birthDate;
    public $birthTown;
    public $address;
    public $matricule;
    public $type;
    public $number;


    protected $rules = [
        'firstName' => 'required|min:3|max:30|regex:/^\S+$/' , 
        'middleName' => 'required|min:3|max:30|regex:/^\S+$/', 
        'lastName' => 'required|min:3|max:30|regex:/^\S+$/', 
        'gender' => 'required|string|in:M,F', 
        'birthDate' => 'required|date|before_or_equal:today', 
        'birthTown' => 'required|min:3|max:100|regex:/^[\pL\pN\s,\.\-#\/]+$/u', 
        'address' => 'required|min:3|max:100|regex:/^[\pL\pN\s,\.\-#\/]+$/u', 
        'matricule' => 'require', 
        'type' => 'required|string|in:Employed,Wife,Housband,Child', 
        'number' => 'nullable|regex:/^[0-9\s\-\+\(\)]+$/|min:8|max:20',
    ];

    public function updateSubscriber()
    {
        $this->validate();
        $update = Subscriber::findOrFail($this->sub);

        $update->update(
        [
            'firstName' => $this->firstName,
            'middleName' => $this->middleName,
            'lastName' => $this->lastName,
            'gender' => $this->gender,
            'birthDate' => $this->birthDate,
            'birthTown' => $this->birthTown,
            'address' => $this->address,
            'matricule' => $this->matricule,
            'type' => $this->type,
            'number' => $this->number,
        ]);
        session()->flash('success', "L'Abonné a été modifié avec succès.");
        return redirect()->to(route('subscriber.index'));
    }

    public function mount($id)
    {

        $updateSub = Subscriber::findOrFail($id);
        
        $this->sub = $updateSub->id;
        $this->firstName = $updateSub->firstName;
        $this->middleName = $updateSub->middleName;
        $this->lastName = $updateSub->lastName;
        $this->gender = $updateSub->gender;
        $this->birthDate = $updateSub->birthDate;
        $this->birthTown = $updateSub->birthTown;
        $this->address = $updateSub->address;
        $this->matricule = $updateSub->matricule;
        $this->type = $updateSub->type;
        $this->number = $updateSub->number;
        
    }

    // Gender Enum
    private function genders(): array
    {
        return GenderEnum::cases();
    }

    // Type Enum
    private function types(): array
    {
        return TypeEnum::cases();
    }

    public function render()
    {
        return view('livewire.module.subscriber.subscriber-update');
    }
}
