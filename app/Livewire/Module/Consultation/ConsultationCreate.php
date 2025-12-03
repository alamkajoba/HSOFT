<?php

namespace App\Livewire\Module\Consultation;

use App\Enums\ConsultationStatusEnum;
use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\Laboratory;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app')]
class ConsultationCreate extends Component
{

    #[Validate('required')]
    public $examRequested;

    #[Validate('required')]
    public $symptomPatient;

    #[Validate('required')]
    public $PhysicalExam;

    #[Validate('required')]
    public $vitalSign;

    #[Validate('required')]
    public $treatment;

    public $specialNote;


    //labo and radio
    public $examRequest;

    public $infoSubscriber;
    public $weight;
    public $appointment_id;
    public $subscriber_id;


    public function mount($id)
    {
        $catchAppointment = Appointment::findOrFail($id);
        $this->weight = $catchAppointment->weight;
        $this->appointment_id = $catchAppointment->id;

        $catchSubscriber = Subscriber::findOrFail($catchAppointment->subscriber_id);
        $this->subscriber_id = $catchSubscriber->id;
        $this->infoSubscriber = $catchSubscriber->middleName. ' '. 
                                $catchSubscriber->lastName .' '.
                                $catchSubscriber->firstName . ' /'. 
                                $catchSubscriber->matricule;

    }

    //Consultation
    public function submitConsultation()
    {
        
        $this->validate();
        $user_id = Auth::id();

        Consultation::create([
            'appointment_id' => $this->appointment_id,
            'user_id' => $user_id,
            'symptomPatient' => $this->symptomPatient,
            'PhysicalExam' => $this->PhysicalExam,
            'vitalSign' => $this->vitalSign,
            'treatment' => $this->treatment,
            'cure' => 'NULL',
            'specialNote' => $this->specialNote,
        ]);

        $appointment = Appointment::findOrFail($this->appointment_id);
        $appointment->update([
            'appointmentStatus' => ConsultationStatusEnum::DONE->value
        ]);
        session()->flash('success', "Consultation finie");
        return redirect()->to(route('appointment.index'));

    }

    //Laboratory request
    public function submitLaboratory()
    {
        //lab must be unique 
        $check = Laboratory::where('appointment_id', $this->appointment_id)->limit(1);

        // if ($check) 
        // {
        //     session()->flash('danger', "Examen labo deja demandee pour le Patient");
        //     return redirect()->to(route('consultation.create', $this->appointment_id));
        // }
        $user_id = Auth::id();

        $lab = Laboratory::create([
            'user_id' => $user_id, 
            'appointment_id' => $this->appointment_id, 
            'examRequested' => $this->examRequested, 
            'result' => '-', 
            'specialNote' => '-',
            'laboStatus' => ConsultationStatusEnum::PENDING->value
        ]);
        session()->flash('success', "Examen labo demande");
        return redirect()->to(route('consultation.create', $this->appointment_id));

    }

    public function render()
    {
        return view('livewire.module.consultation.consultation-create');
    }
}
