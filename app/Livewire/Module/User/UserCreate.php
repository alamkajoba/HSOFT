<?php

namespace App\Livewire\Module\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

#[Layout('layouts.app')]
class UserCreate extends Component
{

    public string $name = '';
    public string $identifiant = '';
    public string $role = '';
    public string $password = '';


    /**
     * Handle an incoming registration request.
     */
    public function register()
    {

        //Be sure that we have only one function 
        $converteRole = Str::lower(trim($this->role));
        $checkRole = Role::whereRaw('LOWER(name) = ?', [$converteRole])->exists();

        if($checkRole)
        {
            session()->flash('danger', "La fonction ".$this->role." est déjà attribuée ");
            return redirect()->to(route('user.create'));
        }

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'identifiant' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ]);
        $create = User::Create([
            'name' => $this->name,
            'identifiant' => $this->identifiant,
            'password' => Hash::make($this->password)
        ]);

        $userRole = Role::firstOrCreate(['name' => $this->role]);
        $create->assignRole($userRole);

        session()->flash('success', "L'utilisateur ".$this->name." ".$this->identifiant." ". " a été créé avec succès.");
        return redirect()->to(route('user.index'));

    }
    public function render()
    {
        return view('livewire.module.user.user-create');
    }
}
