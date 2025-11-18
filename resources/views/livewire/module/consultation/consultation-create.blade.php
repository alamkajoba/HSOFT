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
                        <label for="">Examens labo</label>
                        <textarea 
                            class="form-control"
                            type="textarea"
                            placeholder=""
                            wire:model="labExam" 
                            cols="30">

                        </textarea>


                        <label for="">Examens radio</label>
                        <textarea 
                            class="form-control"
                            type="textarea"
                            placeholder=""
                            wire:model="radioExam" 
                            cols="30">

                        </textarea>

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
</div>
        
