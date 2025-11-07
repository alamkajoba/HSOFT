<div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i style="color:rgb(0, 0, 0);" class="fas fa-fw fa-users"></i>
            Gestion des abonné(e)s
        </h1>
        <div>
            <a href="{{ route('subscriber.index')}}" style="background-color: rgb(7, 7, 99)" class="btn text-white">Voir la liste</a>
        </div>
    </div>

    {{-- NOTIFY --}}
    @if (session()->has('danger'))
        <div id="alert-success" 
            class="alert alert-danger fade show text-center"
            role="alert"
            style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
                    z-index: 9999; width: fit-content; min-width: 500px;">
            {{ session('danger') }}
        </div>
    @endif
    {{-- table --}}
    <div class="justify-content-between card-header">
        <form wire:submit="submitSubscriber">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <label for="middleName">Nom</label>
                        <input 
                            required
                            id="middleName"
                            class="form-control"
                            type="text"
                            placeholder=""
                            wire:model="middleName"
                        >

                        <label for="lastName">Postnom</label>
                        <input 
                            required
                            id="lastName"
                            class="form-control"
                            type="text"
                            placeholder=""
                            wire:model="lastName"
                        >

                        <label for="firstName">Prénom</label>
                        <input 
                            required
                            id="firstName"
                            class="form-control"
                            type="text"
                            placeholder=""
                            wire:model="firstName"
                        >

                        <label for="gender">Genre</label>
                        <select wire:model="gender" id="gender" class="form-control">
                            <option>Selectionner...</option>
                            @foreach ($this->genders() as $gender)
                                <option value="{{ $gender }}">{{ $gender }}</option>
                            @endforeach
                        </select>

                        <label for="bloodGroup">Groupe sanguin</label>
                        <select wire:model="bloodGroup" id="bloodGroup" class="form-control">
                            <option>Selectionner...</option>
                            @foreach ($this->bloodGroups() as $bloodGroup)
                                <option value="{{ $bloodGroup }}">{{ $bloodGroup }}</option>
                            @endforeach
                        </select>

                        <label for="birthDate">Date de naissance</label>
                        <input 
                            required
                            id="birthDate"
                            class="form-control"
                            type="date"
                            placeholder=""
                            wire:model="birthDate"
                        >

                        <label for="birthTown">Lieu de naissance</label>
                        <input 
                            required
                            id="birthTown"
                            class="form-control"
                            type="text"
                            placeholder=""
                            wire:model="birthTown"
                        >
                    </div>

                    <div class="col-md-6">

                        <label for="matricule">Matricule</label>
                        <input 
                            required
                            id="matricule"
                            class="form-control"
                            type="text"
                            placeholder=""
                            wire:model="matricule"
                        >

                        <label for="type">Type d'abonnement</label>
                        <select wire:model="type" id="type" class="form-control">
                            <option>Selectionner...</option>
                            @foreach ($this->types() as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>

                        <label for="affectation">Affectation (Ville)</label>
                        <input 
                            required
                            id="affectation"
                            class="form-control"
                            type="text"
                            placeholder=""
                            wire:model="affectation"
                        >

                        <label for="address">Adresse</label>
                        <input 
                            required
                            id="address"
                            class="form-control"
                            type="text"
                            placeholder=""
                            wire:model="address"
                        >

                        <label for="number">Contact</label>
                        <input 
                            required
                            id="number"
                            class="form-control"
                            type="text"
                            placeholder="ex: +243 992 700 754"
                            wire:model="number"
                        >

                        
                    </div>
                </div>
                <div>
                    <button type="submit" style="background-color: rgb(7, 7, 99)" class="btn text-white py-2 my-3">
                        Valider
                    </button>
                </div>
            </div>
        </form>
    </div>  
</div>
