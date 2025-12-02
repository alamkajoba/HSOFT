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

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rendez-vous</h1>
        <button style="background-color: rgb(7, 7, 99)" class="btn text-white">
            Voir la liste
        </button>
    </div>



    <div class="justify-content-between card-header">
        <form wire:submit="medicineCreate()">
            @csrf
            
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Nom du produit</label>
                        <input 
                            class="form-control"
                            type="text"
                            placeholder=""
                            wire:model="nameMedicine"
                        >


                        <label for="">Selectionner une categorie</label>
                        <select wire:model="category" id="category" class="form-control">
                            <option>Selectionner...</option>
                            @foreach ($this->categorys() as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <button style="background-color: rgb(7, 7, 99)" class="btn text-white py-2 my-3">
                        Valider
                    </button>
                </div>
            </div>
        </form>
    </div>  
</div>
        
