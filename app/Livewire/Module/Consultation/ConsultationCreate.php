<?php

namespace App\Livewire\Module\Consultation;

use App\Enums\ConsultationStatusEnum;
use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\Subscriber;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app')]
class ConsultationCreate extends Component
{

    #[Validate('required')]
    public $symptomPatient;

    #[Validate('nullable')]
    public $PhysicalExam;

    #[Validate('nullable')]
    public $vitalSign;

    #[Validate('nullable')]
    public $labExam;

    #[Validate('nullable')]
    public $radioExam;

    #[Validate('required')]
    public $treatment;

    #[Validate('nullable')]
    public $specialNote;

    public $infoSubscriber;
    public $weight;
    public $appointmentId;
    public $subscriberId;


    public function mount($id)
    {
        $catchAppointment = Appointment::findOrFail($id);
        $this->weight = $catchAppointment->weight;
        $this->appointmentId = $catchAppointment->id;

        $catchSubscriber = Subscriber::findOrFail($catchAppointment->subscriberId);
        $this->subscriberId = $catchSubscriber->id;
        $this->infoSubscriber = $catchSubscriber->middleName. ' '. 
                                $catchSubscriber->lastName .' '.
                                $catchSubscriber->firstName . ' /'. 
                                $catchSubscriber->matricule;

    }

    public function submitConsultation()
    {
        $this->validate();
        $consultation = Consultation::create([
            'subscriberId' => $this->subscriberId,
            'symptomPatient' => $this->symptomPatient,
            'PhysicalExam' => $this->PhysicalExam,
            'vitalSign' => $this->vitalSign,
            'labExam' => $this->labExam,
            'radioExam' => $this->radioExam,
            'treatment' => $this->treatment,
            'specialNote' => $this->specialNote
        ]);
        
        $appointment = Appointment::findOrFail($this->appointmentId);

        $appointment->update([
            'consultationStatus' => ConsultationStatusEnum::DONE->value
        ]);

        session()->flash('success', "Consultation finie");
        return redirect()->to(route('appointment.index'));

    }

    public function render()
    {
        return view('livewire.module.consultation.consultation-create');
    }
}
