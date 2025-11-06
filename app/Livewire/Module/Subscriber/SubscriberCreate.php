<?php

namespace App\Livewire\Module\Subscriber;

use App\Enums\GenderEnum;
use App\Enums\TypeEnum;
use App\Models\Subscriber;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;

#[Layout('layouts.app')]
class SubscriberCreate extends Component
{
    public $convertFirstName;
    public $convertMiddleName;
    public $convertLastName;

    #[Validate('required|min:3|max:30|regex:/^\S+$/')]
    public $firstName = '';

    #[Validate('required|min:3|max:30|regex:/^\S+$/')]
    public $middleName = '';

    #[Validate('required|min:3|max:30|regex:/^\S+$/')]
    public $lastName = '';

    #[Validate('required')]
    public $gender = '';

    #[Validate('required|date|before_or_equal:today')]
    public $birthDate = '';

    #[Validate('required|min:3|max:100|regex:/^[\pL\pN\s,\.\-#\/]+$/u')]
    public $birthTown = '';

    #[Validate('required|min:3|max:100|regex:/^[\pL\pN\s,\.\-#\/]+$/u')]
    public $matricule = '';

    #[Validate('required')]
    public $type = '';

    #[Validate('required|min:3|max:100|regex:/^[\pL\pN\s,\.\-#\/]+$/u')]
    public $address = '';

    #[Validate('required|min:3|max:100|regex:/^[\pL\pN\s,\.\-#\/]+$/u')]
    public $affectation = '';

    #[Validate('nullable|regex:/^[0-9\s\-\+\(\)]+$/|min:8|max:20')]
    public $number = '';




    private function dataSubscriber(): array
    {
        return [
            'firstName' => $this->firstName,
            'middleName' => $this->middleName,
            'lastName' => $this->lastName,
            'gender' => $this->gender,
            'birthDate' => $this->birthDate,
            'birthTown' => $this->birthTown,
            'matricule' => $this->matricule,
            'affectation' => $this->affectation,
            'type' => $this->type,
            'address' => $this->address,
            'number' => $this->number,
        ];
    }


    public function submitSubscriber()
    {
        $this->validate();

        //Check if exist
        $this->convertFirstName = Str::lower(trim($this->firstName));
        $this->convertMiddleName = Str::lower(trim($this->middleName));
        $this->convertLastName = Str::lower(trim($this->lastName));

        $existSubscriber = Subscriber::whereRaw('LOWER(firstName) = ?', [$this->convertFirstName])
            ->whereRaw('LOWER(middleName) = ?', [$this->convertMiddleName])
            ->whereRaw('LOWER(lastName) = ?', [$this->convertLastName])
            ->where('birthDate', $this->birthDate)
            ->exists();

        if ($existSubscriber) {
            session()->flash('danger', "Cet abonné existe déjà!...");
            return redirect()->route('subscriber.create');
        }

        $Subscriber = Subscriber::create($this->dataSubscriber());
        session()->flash('success', "L'Abonné a été créé avec succès.");
        return redirect()->to(route('subscriber.index'));
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
        return view('livewire.module.subscriber.subscriber-create');
    }
}
