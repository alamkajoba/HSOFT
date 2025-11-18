<div class="mb-5">

    <!-- Notification flash -->

    @if (session()->has('success'))
        <div id="alert-success" 
            class="alert alert-success fade show text-center shadow-lg"
            role="alert"
            style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
                    z-index: 9999; width: fit-content; min-width: 500px;">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('danger'))
        <div id="alert-success" 
            class="alert alert-danger fade show text-center shadow-lg"
            role="alert"
            style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
                    z-index: 9999; width: fit-content; min-width: 500px;">
            {{ session('danger') }}
        </div>
    @endif

     <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i style="color:rgb(0, 0, 0);" class="fas fa-fw fa-users"></i>
            Liste des examens termines
        </h1>
        <div class="d-none d-sm-inline-block shadow-sm">
            <input wire:model.live="search" class="form-control" type="text" placeholder="Rechercher...">
        </div>
    </div>

    <!-- Table -->
    <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%">
                    <thead style="background-color: rgb(7, 7, 99)" class="text-white">
                        <tr>
                            <th>Nom Postnom Prenom</th>
                            <th>Poids</th>
                            <th>Matricule</th>
                            <th>Examen demandé</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lab as $labs)
                            <tr>
                                <td>{{ $labs->subscriberId }}</td>
                                <td>{{ $labs->symptomPatient }}</td>
                                <td>{{ $labs->PhysicalExam }}</td>
                                <td>{{ $labs->vitalSign }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn text-white dropdown-toggle" style="background-color: rgb(7, 7, 99)" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="{{route('laboratory.create', $labs->id)}}">Poster resultats </a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <button class="dropdown-item text-danger" wire:click="cancelAppointment({{$labs->id}})">Annuler la consultation</button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-danger">Oups! Aucun rendez-vous trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $lab->links() }}
            </div>

        <!-- Modal delete student -->
        <div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModal" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div style="background-color: rgb(7, 7, 99)" class="modal-header text-white rounded-0">
                        <h5 class="modal-title" id="deleteStudentModal">Confirmer l'action</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulaire de connexion -->
                        <form wire:submit.prevent="destroyStudent">
                            <div class="mb-3">
                                <label for="username" class="form-label">Identifiant</label>
                                <input type="text" class="form-control" wire:model.defer="user" required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" wire:model.defer="password" required autocomplete="off">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button 
                            wire:click="destroyStudent" 
                            style="background-color: rgb(7, 7, 99)" 
                            class="btn text-white"
                        >
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ModalEnd -->
    </div>
</div>





