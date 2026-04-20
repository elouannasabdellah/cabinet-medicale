@extends('layouts.patient')

@section('page-content')

<nav class="navbar navbar-light bg-white border-bottom py-2 sticky-top">
    <div class="container-fluid px-4">

        <div class="d-flex align-items-center">
            <h5 class="fw-bold mb-0 text-dark">Ordonnance</h5>
        </div>

        <div class="d-flex align-items-center gap-2">

            <!-- <div class="position-relative p-2 rounded-circle bg-light d-flex align-items-center justify-content-center" 
                 style="width: 38px; height: 38px; cursor: pointer;">
                <i class="fas fa-bell text-secondary" style="font-size: 0.9rem;"></i>
                <span class="position-absolute top-1 start-100 translate-middle p-1 bg-danger border border-white rounded-circle"></span>
            </div> -->
            <div class="dropdown">
                <button class="btn btn-light rounded-circle position-relative border-0 shadow-sm d-flex align-items-center justify-content-center"
                    id="notifMenu" data-bs-toggle="dropdown" aria-expanded="false"
                    style="width: 40px; height: 40px; background: #f8faff;">
                    <i class="bi bi-bell-fill text-muted"></i>

                    @if(auth()->user()->unreadNotifications->count() > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-white"
                        style="font-size: 0.65rem; margin-left: -5px; margin-top: 5px;">
                        {{ auth()->user()->unreadNotifications->count() }}
                    </span>
                    @endif
                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-3 py-0 overflow-hidden"
                    aria-labelledby="notifMenu" style="width: 320px; border-radius: 15px;">
                    <li class="p-3 border-bottom bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="fw-bold mb-0">Notifications</h6>
                            <span class="badge bg-primary-soft text-primary small">{{ auth()->user()->unreadNotifications->count() }} Nouvelles</span>
                        </div>
                    </li>
                    <div style="max-height: 300px; overflow-y: auto;">
                        @forelse(auth()->user()->notifications->take(5) as $notification)
                        <li>
                            <a class="dropdown-item py-3 border-bottom d-flex align-items-start gap-3 {{ $notification->read_at ? 'opacity-75' : 'bg-light-blue' }}" href="#">
                                @php
                                $status = $notification->data['status'] ?? 'confirmed';
                                @endphp

                                <div class="icon-circle {{ $status == 'cancelled' ? 'bg-danger' : 'bg-success' }} text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 35px; height: 35px; flex-shrink: 0;">

                                    <i class="bi {{ $status == 'cancelled' ? 'bi-x-circle' : 'bi-check2-circle' }}"></i>
                                </div>

                                <div>
                                    <p class="small mb-1 text-wrap" style="line-height: 1.4;">
                                        {{ $notification->data['message'] }}
                                    </p>
                                    <small class="text-muted">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </small>
                                </div>
                            </a>
                        </li>
                        @empty
                        <li class="p-4 text-center text-muted small">Aucune notification pour le moment</li>
                        @endforelse
                    </div>
                    @if(auth()->user()->unreadNotifications->count() > 0)
                    <li><a class="dropdown-item text-center py-2 small text-primary fw-bold" href="{{ route('notifications.readAll') }}">Tout marquer comme lu</a></li>
                    @endif
                </ul>
            </div>

            <!-- <div class="vr mx-1 opacity-25" style="height: 25px;"></div> -->

            <div class="dropdown">
                <div class="d-flex align-items-center gap-1 cursor-pointer" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="text-end d-none d-md-block">
                        <!-- <p class="mb-0 fw-bold text-dark small text-capitalize" style="line-height: 1;">
                             {{ Auth::user()->name }}
                        </p>  -->
                        <!-- <small class="text-muted" style="font-size: 0.65rem;">Patient</small> -->
                    </div>
                    <div class="rounded-circle border border-2 border-primary overflow-hidden" style="width: 38px; height: 38px;">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D6EFD&color=fff"
                            class="w-100 h-100 object-fit-cover">
                    </div>
                </div>

                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2">
                    <li><a class="dropdown-item py-2" href="#"><i class="fas fa-user-circle me-2 text-primary"></i>Profil</a></li>
                    <li><a class="dropdown-item py-2" href="#"><i class="fas fa-cog me-2 text-primary"></i>Paramètres</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item py-2 text-danger">
                                <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>




<!-- <div class="container py-5">
    <div class="d-flex align-items-center mb-5 border-bottom border-warning border-3 pb-3">
        <div class="bg-primary p-3 rounded-4 me-3 shadow-sm">
            <i class="bi bi-file-earmark-medical-fill text-warning fs-3"></i>
        </div>
        <div>
            <h2 class="fw-bold text-primary mb-0">Espace Ordonnances</h2>
            <p class="text-muted mb-0">Patient : <span class="fw-bold text-dark">Abdallah</span></p>
        </div>
    </div>

    <div class="row">
        @foreach($ordonnances as $id => $items)
        @php $premiere = $items->first(); @endphp
        <div class="col-xl-6 mb-4">
            <div class="card border-0 shadow-sm rounded-4 bento-card h-100">
                <div class="card-body p-0">
                    <div class="d-flex flex-column flex-md-row h-100">
                        
                        <div class="bg-primary text-white p-4 d-flex flex-column justify-content-between rounded-start-4" style="min-width: 180px;">
                            <div>
                                <span class="badge bg-warning text-dark fw-bold mb-3">N° {{ $id }}</span>
                                <h4 class="fw-bold mb-1">{{ $premiere->created_at->format('d') }}</h4>
                                <p class="text-uppercase small mb-0">{{ $premiere->created_at->format('M Y') }}</p>
                            </div>
                            <div class="mt-4 mt-md-0">
                                <i class="bi bi-qr-code text-warning fs-1"></i>
                            </div>
                        </div>

                        <div class="flex-grow-1 p-4 bg-white rounded-end-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold text-primary mb-0">Dr. Alaoui</h5>
                                <i class="bi bi-patch-check-fill text-primary"></i>
                            </div>

                            <div class="prescription-box mb-4">
                                @foreach($items as $item)
                                <div class="d-flex align-items-start mb-3 border-start border-warning border-3 ps-3">
                                    <div>
                                        <h6 class="mb-0 fw-bold">{{ $item->medicament_nom }}</h6>
                                        <small class="text-muted">{{ $item->posologie }} • {{ $item->duree }}</small>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <a href="{{ route('patient.ordonnance.download', $id) }}" 
                               class="btn btn-warning w-100 rounded-3 py-2 fw-bold text-dark shadow-sm hover-scale">
                                <i class="bi bi-file-pdf-fill me-2"></i> Télécharger l'ordonnance
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    /* Design spécifique */
    .bento-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border-bottom: 5px solid #ffc107 !important; /* Bordure jaune en bas */
    }
    
    .bento-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(13, 110, 253, 0.1) !important;
    }

    .hover-scale:hover {
        filter: brightness(0.9);
        transform: scale(0.98);
        transition: 0.2s;
    }

    .bg-primary { background-color: #0d6efd !important; } /* Ton bleu */
    .text-primary { color: #0d6efd !important; }
    .btn-warning { background-color: #ffc107 !important; border: none; } /* Ton jaune */
</style> -->

<!-- <div class="container py-5">
    <div class="header-section mb-5">
        <h2 class="display-6 fw-bold text-primary">Tableau de Bord <span class="text-warning">Santé</span></h2>
        <div class="h-line bg-warning"></div>
    </div>

    <div class="row">
        @foreach($ordonnances as $id => $items)
        @php $premiere = $items->first(); @endphp
        <div class="col-12 mb-4">
            <div class="card border-0 shadow-lg overflow-hidden custom-card">
                <div class="row g-0">
                    
                    <div class="col-md-1 bg-primary d-flex flex-md-column justify-content-center align-items-center p-3 text-white gap-3">
                        <i class="bi bi-calendar-check fs-3"></i>
                        <div class="rotated-text fw-bold text-warning">{{ $premiere->created_at->format('M Y') }}</div>
                    </div>

                    <div class="col-md-8 bg-white p-4">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <span class="badge rounded-pill bg-primary text-warning px-3 py-2">RÉF #ORD-00{{ $id }}</span>
                            <span class="text-muted small"><i class="bi bi-clock-history me-1"></i> Émis le {{ $premiere->created_at->format('d/m/Y') }}</span>
                        </div>
                        
                        <h4 class="fw-bold text-dark mb-4">Prescription par : <span class="text-primary text-decoration-underline">Dr. Alaoui</span></h4>

                        <div class="row row-cols-1 row-cols-md-2 g-3">
                            @foreach($items as $item)
                            <div class="col">
                                <div class="p-3 border rounded-3 bg-light-blue h-100">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <div class="dot bg-warning"></div>
                                        <strong class="text-primary">{{ $item->medicament_nom }}</strong>
                                    </div>
                                    <div class="ps-3 small text-muted">{{ $item->posologie }} • {{ $item->duree }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-3 bg-light d-flex flex-column justify-content-center p-4 border-start border-warning border-3">
                        <div class="text-center mb-4 d-none d-md-block">
                            <img src="{{ asset('img/qr-placeholder.png') }}" class="img-fluid rounded border border-2 border-warning" style="max-width: 100px;" alt="QR Code">
                        </div>
                        <a href="{{ route('patient.ordonnance.download', $id) }}" 
                           class="btn btn-primary btn-lg rounded-pill fw-bold text-warning w-100 shadow-sm border-2 border-warning">
                            <i class="bi bi-file-earmark-pdf-fill me-2"></i> PDF
                        </a>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    /* Couleurs personnalisées */
    .bg-primary { background-color: #0d6efd !important; }
    .text-primary { color: #0d6efd !important; }
    .text-warning { color: #ffc107 !important; }
    .bg-warning { background-color: #ffc107 !important; }
    .bg-light-blue { background-color: #f0f7ff; }

    /* Structure Unique */
    .custom-card {
        border-radius: 20px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .custom-card:hover {
        transform: scale(1.01) translateX(5px);
    }

    .h-line { height: 4px; width: 60px; border-radius: 2px; }

    .rotated-text {
        writing-mode: vertical-lr;
        transform: rotate(180deg);
        letter-spacing: 2px;
        font-size: 0.8rem;
    }

    .dot { width: 8px; height: 8px; border-radius: 50%; }

    @media (max-width: 768px) {
        .rotated-text { writing-mode: horizontal-tb; transform: none; }
    }
</style> -->

<!-- <div class="container py-5">
    <div class="row mb-5">
        <div class="col-12">
            <h6 class="text-warning fw-bold text-uppercase tracking-wider">Services de Santé</h6>
            <h2 class="display-5 fw-bold text-primary">Mes Prescriptions</h2>
            <div class="bg-warning mt-2" style="height: 4px; width: 80px; border-radius: 2px;"></div>
        </div>
    </div>

    <div class="row g-4">
        @foreach($ordonnances as $id => $items)
        @php $premiere = $items->first(); @endphp
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-4 h-100 overflow-hidden">
                <div class="bg-primary p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="text-white fw-bold mb-0">Ordonnance #ORD-00{{ $id }}</h5>
                        <small class="text-warning fw-semibold">Consultation du {{ $premiere->created_at->format('d/m/Y') }}</small>
                    </div>
                    <div class="bg-white bg-opacity-10 rounded-3 p-2">
                        <i class="bi bi-shield-check text-warning fs-4"></i>
                    </div>
                </div>

                <div class="card-body p-4 bg-white">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0">
                            <div class="bg-light rounded-circle p-3">
                                <i class="bi bi-person-vcard text-primary fs-4"></i>
                            </div>
                        </div>
                        <div class="ms-3">
                            <p class="text-muted small mb-0">Médecin prescripteur</p>
                            <h6 class="fw-bold text-dark mb-0">Dr. Alaoui</h6>
                        </div>
                    </div>

                    <div class="prescription-list bg-light p-3 rounded-4 border-start border-warning border-4">
                        <h6 class="small fw-bold text-primary text-uppercase mb-3">Traitement</h6>
                        @foreach($items as $item)
                        <div class="d-flex justify-content-between align-items-center mb-2 last-no-border pb-2 border-bottom border-white">
                            <div>
                                <span class="d-block fw-bold text-dark">{{ $item->medicament_nom }}</span>
                                <small class="text-muted">{{ $item->posologie }}</small>
                            </div>
                            <span class="badge bg-primary text-warning rounded-pill">{{ $item->duree }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="card-footer bg-white border-0 p-4 pt-0">
                    <a href="{{ route('patient.ordonnance.download', $id) }}"
                        class="btn btn-warning w-100 py-3 rounded-3 fw-bold text-primary shadow-sm btn-hover-blue">
                        <i class="bi bi-cloud-arrow-down-fill me-2"></i> Télécharger le document PDF
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .tracking-wider {
        letter-spacing: 0.1em;
    }

    .bg-opacity-10 {
        background-color: rgba(255, 255, 255, 0.15);
    }

    .btn-hover-blue:hover {
        background-color: #0d6efd !important;
        color: #ffc107 !important;
        border-color: #0d6efd;
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }

    .last-no-border:last-child {
        border-bottom: 0 !important;
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }
</style> -->

<!-- <div class="container py-4">
    <div class="mb-4">
        <h5 class="text-warning small fw-bold text-uppercase mb-1">Services de Santé</h5>
        <h3 class="fw-bold text-primary">Mes Prescriptions</h3>
    </div>

    <div class="row g-3">
        @foreach($ordonnances as $id => $items)
        @php $premiere = $items->first(); @endphp
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden h-100">
                <div class="bg-primary px-3 py-2 d-flex justify-content-between align-items-center">
                    <span class="text-white small fw-bold">#ORD-00{{ $id }}</span>
                    <i class="bi bi-shield-check text-warning small"></i>
                </div>

                <div class="card-body p-3">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="small text-muted">
                            <i class="bi bi-calendar3"></i> {{ $premiere->created_at->format('d/m/Y') }}
                        </div>
                        <div class="small fw-bold text-dark">
                            Dr. Alaoui
                        </div>
                    </div>

                    <div class="bg-light p-2 rounded-2 mb-3">
                        @foreach($items as $item)
                        <div class="d-flex justify-content-between align-items-center mb-1 border-bottom border-white pb-1 last-no-border">
                            <span class="small fw-bold text-dark text-truncate" style="max-width: 120px;">
                                {{ $item->medicament_nom }}
                            </span>
                            <span class="badge bg-primary-light text-primary x-small">{{ $item->duree }}</span>
                        </div>
                        @endforeach
                    </div>

                    <a href="{{ route('patient.ordonnance.download', $id) }}"
                        class="btn btn-warning w-100 btn-sm fw-bold text-primary rounded-pill">
                        <i class="bi bi-download me-1"></i> PDF
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .x-small {
        font-size: 0.7rem;
    }

    .bg-primary-light {
        background-color: rgba(13, 110, 253, 0.1);
    }

    .last-no-border:last-child {
        border-bottom: 0 !important;
        margin-bottom: 0 !important;
    }

    /* Animation douce */
    .card {
        transition: transform 0.2s;
    }

    .card:hover {
        transform: translateY(-3px);
    }
</style> -->

<div class="container py-4">
    <div class="mb-4 ps-3 border-start border-warning border-4">
        <h3 class="fw-bold text-primary mb-0">Mes Ordonnances</h3>
        <p class="text-muted small">Historique de vos soins médicaux</p>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($ordonnances as $id => $items)
        @php $premiere = $items->first(); @endphp
        <div class="col">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 card-hover">
                <div class="card-body p-0 d-flex flex-column h-100">

                    <div class="bg-primary p-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning text-primary fw-bold rounded-2 px-2 py-1 me-2 small">
                                {{ $premiere->created_at->format('d M') }}
                            </div>
                            <span class="text-white fw-bold small">ORD-00{{ $id }}</span>
                        </div>
                        <i class="bi bi-patch-check-fill text-warning"></i>
                    </div>

                    <div class="p-3 flex-grow-1">
                        <div class="mb-3">
                            <p class="text-muted x-small mb-1 text-uppercase fw-bold">Médecin</p>
                            <h6 class="fw-bold text-dark mb-0">Dr. Alaoui</h6>
                        </div>

                        <div class="bg-light p-2 rounded-3">
                            <p class="text-primary x-small mb-2 fw-bold text-uppercase">Médicaments</p>
                            @foreach($items as $item)
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="small fw-semibold text-dark">{{ $item->medicament_nom }}</span>
                                <span class="badge bg-white text-primary border border-primary-subtle x-small">{{ $item->duree }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="p-3 pt-0 mt-auto">
                        <a href="{{ route('patient.ordonnance.download', $id) }}"
                            class="btn btn-warning w-100 fw-bold text-primary rounded-3 shadow-sm py-2 transition-btn">
                            <i class="bi bi-download me-2"></i> Télécharger PDF
                        </a>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .x-small {
        font-size: 0.7rem;
        letter-spacing: 0.5px;
    }

    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(13, 110, 253, 0.1) !important;
    }

    .transition-btn:hover {
        background-color: #0d6efd !important;
        color: #ffc107 !important;
        border: none;
    }
</style>





@endsection