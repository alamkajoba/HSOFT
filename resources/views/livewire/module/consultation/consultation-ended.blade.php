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
            Liste des consultations finies
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
                            <th>Matricule</th>
                            <th>Traitement</th>
                            <th>Date et heure</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($consultation as $consultations)
                            <tr>
                                <td>
                                    {{ $consultations->subscriber->middleName }}
                                    {{ $consultations->subscriber->lastName }}
                                    {{ $consultations->subscriber->firstName }}
                                </td>
                                <td>{{ $consultations->subscriber->matricule }}</td>
                                <td>{{ $consultations->consultation->treatment }}</td>
                                <td>{{ $consultations->updated_at }}</td>
                                <td style="background-color: rgb(1, 148, 33)" class="text-white">{{ $consultations->appointmentStatus }}</td>
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
                {{ $consultation->links() }}
            </div>
    </div>
</div>




