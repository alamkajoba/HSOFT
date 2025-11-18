<?php

namespace App\Livewire\Module\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class UserIndex extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';

    #[Url(as: 'q')]
    public ?string $search = '';

    //Var deleteUser
    public $UserIdToDelete = '';


    // Var detailUser
    public $name ='';
    public $identifiant ='';
    public $permission;
    public $createUser ='';
    public $roleUser ='';


    protected $listeners = [
        'setUserId',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Reçoit l'ID envoyé par JS à l'ouverture du modal
    public function setUserId($id)
    {
        $this->UserIdToDelete = $id;
    }

    public function destroyUser()
    {
        $user = User::findOrFail($this->UserIdToDelete);
        $user->delete();
        session()->flash('success', "L'utilisateur a été supprimé avec succès.");
        return redirect()->to(route('user.index'));
    }


    public function detailUser($id)
    {
        $user = User::with('roles', 'permissions')->findOrFail($id);

        $this->name = $user->name;
        $this->identifiant = $user->identifiant;

        // Récupérer tous les rôles (en array ou collection)
        $this->roleUser = $user->getRoleNames()->first();

        // Permissions directes + héritées
        $this->permission = $user->getAllPermissions()->pluck('name')->toArray() ?? [];

    }

    public function render()
    {
        $query = User::where('id', '!=', 1)
            ->where(function ($q) {
                if ($this->search) {  // Vérifiez si $this->search a une valeur
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('identifiant', 'like', '%' . $this->search . '%');
                }
            });

        return view('livewire.module.user.user-index',[
                'user' => $query->latest()->paginate(5),
            ]);
    }
}
