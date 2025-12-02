<div>
<!-- notify -->
     @if (session()->has('success'))
        <div id="alert-success" 
            class="alert alert-success fade show text-center"
            role="alert"
            style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
                    z-index: 9999; width: fit-content; min-width: 500px;">
            {{ session('success') }}
        </div>
    @endif
     @if (session()->has('danger'))
        <div id="alert-danger" 
            class="alert alert-danger fade show text-center"
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
            Fiche de Mr/Mm: <strong>{{$infoSubscriber}} </strong>
            Poids : <strong>{{$weight}} Kg</strong>
        </h1>
        <div class="d-none d-sm-inline-block shadow-sm">
            {{-- <input wire:model.live="search" class="form-control" type="text" placeholder="Rechercher..."> --}}
        </div>
    </div>



    <div class="justify-content-between card-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a 
                        style="background-color: rgb(1, 148, 33)" 
                        class="btn text-white py-2 my-3"
                        data-bs-toggle="modal" 
                        data-bs-target="#laboModal">
                        Demander un examen de labo
                    </a>
                </div>
                <div class="col-md-6">
                    <a 
                        style="background-color: rgb(1, 148, 33)" 
                        class="btn text-white py-2 my-3"
                        data-bs-toggle="modal" 
                        data-bs-target="#radioModal">
                        Demander un examen de radio
                    </a>
                </div>
            </div>
        </div>

        <form wire:submit="submitConsultation">
            @csrf
            
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Symptômes du patient</label>
                        <textarea 
                            class="form-control"
                            type="textarea"
                            placeholder=""
                            wire:model="symptomPatient" 
                            cols="30">

                        </textarea>


                        <label for="">Examen physique (Medecin)</label>
                        <textarea 
                            class="form-control"
                            type="textarea"
                            placeholder=""
                            wire:model="PhysicalExam" 
                            cols="30">

                        </textarea>

                        <label for="">Signes vitaux</label>
                        <textarea 
                            class="form-control"
                            type="textarea"
                            placeholder=""
                            wire:model="vitalSign" 
                            cols="30">

                        </textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="">Traitement</label>
                        <textarea 
                            class="form-control"
                            type="textarea"
                            placeholder=""
                            wire:model="treatment" 
                            cols="30">

                        </textarea>

                        <label for="">Note speciale (Remarque)</label>
                        <textarea 
                            class="form-control"
                            type="textarea"
                            placeholder=""
                            wire:model="specialNote" 
                            cols="30">

                        </textarea>
                    </div>
                </div>
                <div>
                    <button style="background-color: rgb(7, 7, 99)" class="btn text-white py-2 my-3">
                        Finir la consultaion
                    </button>
                </div>
            </div>
        </form>
    </div>  





    <!-- Modal Request exams -->
    <div class="modal fade" id="laboModal" tabindex="-1" aria-labelledby="laboModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div style="background-color: rgb(7, 7, 99)" class="modal-header text-white rounded-0">
                    <h5 class="modal-title" id="laboModalLabel">Examen de labo pour :{{$infoSubscriber}}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <form wire:submit.prevent="submitLaboratory">
                    <div class="modal-body">
                        <label for="">Type d'examen</label>
                            <textarea 
                                class="form-control"
                                type="textarea"
                                placeholder=""
                                wire:model="examRequested" 
                                cols="30"
                                rows="6">

                            </textarea>
                        </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" style="background-color: rgb(7, 7, 99)" class="btn text-white" data-bs-dismiss="modal">Demander</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ModalEnd -->
    <!-- Modal Request exams -->
    <div class="modal fade" id="radioModal" tabindex="-1" aria-labelledby="radioModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div style="background-color: rgb(7, 7, 99)" class="modal-header text-white rounded-0">
                    <h5 class="modal-title" id="radioModalLabel">Examen de radio pour :</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <label for="">Type d'examen</label>
                        <textarea 
                            class="form-control"
                            type="textarea"
                            placeholder=""
                            wire:model="radio" 
                            cols="30" 
                            rows="6">

                        </textarea>
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button wire:click="" style="background-color: rgb(7, 7, 99)" class="btn text-white" data-bs-dismiss="modal">Demander</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ModalEnd -->
</div>
        
