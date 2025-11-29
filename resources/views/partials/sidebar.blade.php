<ul style="background-color: rgb(7, 7, 99)" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard.dashboard')}}">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i class="fas fa-user-md"></i>
                </div>
                <div style="color:white;" class="sidebar-brand-text mx-3">H-Soft </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.dashboard')}}">
                    <i style="color:white;" class="fas fa-home"></i>
                    <span style="color:white;">Acceuil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div style="color:white;" class="sidebar-heading">
                Consultation et abonnees
            </div>

            {{--SUBSCRIBERS--}}
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesubscriber"
                    aria-expanded="true" aria-controls="collapsesubscriber">
                    <i style="color:white;" class="fas fa-fw fa-users"></i>
                    <span style="color:white;">Gestion des abonné(e)s</span>
                </a>
                <div id="collapsesubscriber" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @can('peut voir un abonée')
                            <a style="color:black;" class="collapse-item" href="{{route('subscriber.index')}}">
                                Liste des abonné(e)s
                            </a>
                        @endcan
                        @can('peut créer un abonée')
                            <a style="color:black;" class="collapse-item" href="{{route('subscriber.create')}}">
                                Ajouter un abonné
                            </a>
                        @endcan
                    </div>
                </div>
            </li>

            {{--APPOINTMENTS--}}

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseappointment"
                    aria-expanded="true" aria-controls="collapseappointment">
                    <i style="color:white;" class="fas fa-thermometer-empty"></i>
                    <span style="color:white">Consultation</span> 
                    <span style="background-color:red" class="badge">
                        {{App\Models\Appointment::where('appointmentStatus', App\Enums\ConsultationStatusEnum::PENDING->value)->count()}}
                    </span>
                </a>
                <div id="collapseappointment" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @can('peut voir un rendez-vous')
                            <a style="color:black;" class="collapse-item" href="{{route('appointment.index')}}">
                                Fil d'attente
                            </a>
                        @endcan
                        @can('peut créer un rendez-vous')
                            <a style="color:black;" class="collapse-item" href="{{route('appointment.create')}}">
                                Ajouter un nouveau
                            </a>
                        @endcan
                        @can('peut voir une consultation finie')
                            <a style="color:black;" class="collapse-item" href="{{route('consultation.ended')}}">
                                Consultations finies
                            </a>
                        @endcan
                        @can('peut voir une consultation annulée')
                            <a style="color:black;" class="collapse-item" href="{{route('consultation.cancelled')}}">
                                Consultations annulées
                            </a>
                        @endcan
                    </div>
                </div>
            </li>


            {{--Pharmacy--}}

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePharmacie"
                    aria-expanded="true" aria-controls="collapsePharmacie">
                    <i style="color:white;" class="fas fa-spinner"></i>
                    <span style="color:white;"> Pharmacie</span>
                </a>
                <div id="collapsePharmacie" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a style="color:black;" class="collapse-item" href="">Fil d'attente</a>
                        <a style="color:black;" class="collapse-item" href="">Consultations</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div style="color:white;" class="sidebar-heading">
                Examens
            </div>

            {{--Radio--}}

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRadio"
                    aria-expanded="true" aria-controls="collapseRadio">
                    <i style="color:white;" class="fas fa-spinner"></i>
                    <span style="color:white;"> Radiologie</span>
                </a>
                <div id="collapseRadio" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a style="color:black;" class="collapse-item" href="">Fil d'attente</a>
                        <a style="color:black;" class="collapse-item" href="">Tests finis</a>
                    </div>
                </div>
            </li>

            {{--Labo--}}

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLabo"
                    aria-expanded="true" aria-controls="collapseLabo">
                    <i style="color:white;" class="fas fa-spinner"></i>
                    <span style="color:white;"> Labo</span>
                </a>
                <div id="collapseLabo" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a style="color:black;" class="collapse-item" href="">
                            Examens en attente
                        </a>
                        <a style="color:black;" class="collapse-item" href="">
                            Examens finis
                        </a>
                        <a style="color:black;" class="collapse-item" href="">
                            Examens anulés
                        </a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div style="color:white;" class="sidebar-heading">
                Resultats
            </div>

            {{--After Exam--}}

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAfter"
                    aria-expanded="true" aria-controls="collapseAfter">
                    <i style="color:white;" class="fas fa-spinner"></i>
                    <span style="color:white;"> Resultats (Labo/Radio)</span>
                </a>
                <div id="collapseAfter" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a style="color:black;" class="collapse-item" href="">Fil d'attente</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div style="color:white;" class="sidebar-heading">
                Interface
            </div>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i style="color:white;" class="fas fa-fw fa-wrench"></i>
                    <span style="color:white;">Gestion du personnel</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a style="color:black;" class="collapse-item" href="{{route('user.index')}}">Liste agent (dispensaire)</a>
                        <a style="color:black;" class="collapse-item" href="{{route('user.create')}}">Ajouter un agent</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>