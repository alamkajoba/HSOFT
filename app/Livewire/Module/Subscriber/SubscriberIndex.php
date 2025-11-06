<?php

namespace App\Livewire\Module\Subscriber;

use App\Models\Subscriber;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class SubscriberIndex extends Component
{


    use WithPagination;
    use WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';

    #[Url(as: 'q')]
    public ?string $search = '';

    public function render()
    {

        $subscriber = Subscriber::where('firstName', 'like', '%' . $this->search . '%')
            ->orWhere('middleName', 'like', '%' . $this->search . '%')
            ->orWhere('lastName', 'like', '%' . $this->search . '%')
            ->orWhere('matricule', 'like', '%' . $this->search . '%');

        return view('livewire.module.subscriber.subscriber-index', [
            'subscriber' => $subscriber->latest()->paginate(5),
        ]);
    }
}
