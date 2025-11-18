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

 

    <!-- Table -->
    <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%">
                    <thead style="background-color: rgb(7, 7, 99)" class="text-white">
                        <tr>
                            <th>Id</th>
                            <th>Poids</th>
                            <th>Statut de la consultation</th>
                            <th>Matricule</th>
                            <th>affectation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointment as $appointments)
                            <tr>
                                <td>{{ $appointments->subscriberId }}</td>
                                <td>{{ $appointments->weight }}</td>
                                @if ($appointments->consultationStatus === 'EN ATTENTE')
                                    <td style="background-color: rgb(1, 148, 33)" class="text-white">{{ $appointments->consultationStatus }}</td>
                                @endif

                                @if ($appointments->consultationStatus === 'EN COURS')
                                    <td style="background-color: rgb(168, 166, 2)" class="text-white">{{ $appointments->consultationStatus }}</td>
                                @endif

                                @if ($appointments->consultationStatus === 'ANULEE')
                                    <td style="background-color: rgb(145, 0, 0)" class="text-white">{{ $appointments->consultationStatus }}</td>
                                @endif

                                @if ($appointments->consultationStatus === 'TERMINEE')
                                    <td style="background-color: c" class="text-white">{{ $appointments->consultationStatus }}</td>
                                @endif
                                
                                <td>{{ $appointments->weight }}</td>
                                <td>{{ $appointments->weight }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn text-white dropdown-toggle" style="background-color: rgb(7, 7, 99)" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="{{route('consultation.create', $appointments->id)}}">Consulter </a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#">Annuler la consultation</a></li>
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
                {{ $appointment->links() }}
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




