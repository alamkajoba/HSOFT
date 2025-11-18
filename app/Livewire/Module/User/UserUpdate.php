<?php

namespace App\Livewire\Module\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class UserUpdate extends Component
{

    public string $userId;
    public string $name;
    public string $identifiant;
    public string $password;
    public string $role;

    public function mount($id)
    {
        $user = User::findOrFail($id);

        //associate
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->identifiant = $user->identifiant;
        $this->role = $user->getRoleNames()->first();
    }

    public function updateUser()
    {
        $user = User::findOrFail($this->userId);

        if($this->password)
        {
            $validated = $this->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'middle_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            ]);
            $validated['password'] = Hash::make($validated['password']);
            $update = $user->update($validated);
            session()->flash('success', "L'utilisateur a été modifié avec succès.");
            return redirect()->to(route('user.index'));
        }


        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);
        $update = $user->update($validated);
        session()->flash('success', "L'utilisateur a été modifié avec succès.");
        return redirect()->to(route('user.index'));

    }

    public function render()
    {
        return view('livewire.module.user.user-update');
    }
}
