@extends('layouts.patient')

@section('page-content')

<div class="d-flex justify-content-between align-items-center bg-white shadow-sm border-bottom w-100"
    style="padding: 0.8rem 2rem; position: sticky; top: 0; z-index: 1020;">

    <div>
        <h2 class="fw-bold mb-0 h4" style="color: #2d3748;">Tableau de bord</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-primary">Accueil</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <div class="d-flex align-items-center gap-3">
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
            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-3 py-0 overflow-hidden" style="width: 320px; border-radius: 15px;">
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
                            <div class="icon-circle {{ ($notification->data['status'] ?? 'confirmed') == 'cancelled' ? 'bg-danger' : 'bg-success' }} text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px; flex-shrink: 0;">
                                <i class="bi {{ ($notification->data['status'] ?? 'confirmed') == 'cancelled' ? 'bi-x-circle' : 'bi-check2-circle' }}"></i>
                            </div>
                            <div>
                                <p class="small mb-1 text-wrap" style="line-height: 1.4;">{{ $notification->data['message'] }}</p>
                                <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                            </div>
                        </a>
                    </li>
                    @empty
                    <li class="p-4 text-center text-muted small">Aucune notification</li>
                    @endforelse
                </div>
            </ul>
        </div>

        <div class="dropdown">
            <div class="d-flex align-items-center gap-2 cursor-pointer" id="userMenu" data-bs-toggle="dropdown">
                <div class="user-avatar-circle shadow-sm">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
            </div>
            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-3 py-2" style="border-radius: 12px; min-width: 200px;">
                <li><a class="dropdown-item py-2" href="{{ route('profile.edit') }}"><i class="bi bi-person me-2"></i> Mon Profil</a></li>
                <li><a class="dropdown-item py-2" href="#"><i class="bi bi-calendar-event me-2"></i> Mes RDVs</a></li>
                <li>
                    <hr class="dropdown-divider mx-2">
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item py-2 text-danger fw-bold"><i class="bi bi-box-arrow-right me-2"></i> Déconnexion</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container px-4 mt-4">

    <div class="mb-4">
        <h3 class="fw-bold h4 mb-1">
            @php
            $heure = date('H');
            $salutation = ($heure < 18) ? 'Bonjour' : 'Bonsoir' ;
                @endphp
                {{ $salutation }}, {{ explode(' ', Auth::user()->name)[0] }} 👋
                </h3>
                <p class="text-muted small">Heureux de vous revoir. Voici un résumé de votre activité santé.</p>
    </div>

    @if($prochainRDV)
    <div class="alert alert-appointment border-0 shadow-sm mb-4">
        <div class="d-flex align-items-center">
            <div class="icon-container-alert me-3">
                <i class="bi bi-bell-fill text-warning fs-3"></i>
            </div>
            <div class="text-white">
                <h5 class="mb-1 fw-bold">Prochain rendez-vous le {{ \Carbon\Carbon::parse($prochainRDV->date)->format('d/m/Y') }} à {{ $prochainRDV->time }}</h5>
                <p class="mb-0 opacity-75 small">Veuillez vous présenter 15 minutes à l'avance au cabinet.</p>
            </div>
        </div>
    </div>
    @endif

    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 card-stat">
                <div class="stat-icon-bg bg-primary-soft mb-3">
                    <i class="bi bi-calendar-event text-primary fs-4"></i>
                </div>
                <h2 class="fw-bold mb-1 text-primary">3</h2>
                <p class="text-muted small mb-0 fw-medium">RDV à venir</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 card-stat">
                <div class="stat-icon-bg bg-success-soft mb-3">
                    <i class="bi bi-check-circle text-success fs-4"></i>
                </div>
                <h2 class="fw-bold mb-1" style="color: #2c3e50;">12</h2>
                <p class="text-muted small mb-0 fw-medium">Consultations</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 card-stat">
                <div class="stat-icon-bg bg-warning-soft mb-3">
                    <i class="bi bi-file-earmark-text text-warning fs-4"></i>
                </div>
                <h2 class="fw-bold mb-1" style="color: #2c3e50;">5</h2>
                <p class="text-muted small mb-0 fw-medium">Ordonnances</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 card-stat">
                <div class="stat-icon-bg bg-danger-soft mb-3">
                    <i class="bi bi-x-circle text-danger fs-4"></i>
                </div>
                <h2 class="fw-bold mb-1 text-danger">1</h2>
                <p class="text-muted small mb-0 fw-medium">Annulations</p>
            </div>
        </div>
    </div>

    @php
    $consignes = [
    "Prévention : N'oubliez pas de réaliser votre bilan de santé annuel pour un suivi optimal.",
    "Hydratation : Buvez au moins 1,5 litre d'eau par jour pour maintenir votre énergie.",
    "Activité : Une marche de 30 minutes chaque jour contribue à une meilleure santé cardiaque.",
    "Repos : Un sommeil régulier de 7 à 8 heures est essentiel à votre récupération."
    ];
    $consigneAleatoire = $consignes[array_rand($consignes)];
    @endphp

    <div class="row g-4 pb-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-primary text-white position-relative overflow-hidden card-advice">
                <i class="bi bi-shield-plus position-absolute end-0 bottom-0 opacity-10" style="font-size: 10rem; margin-right: -20px; margin-bottom: -20px;"></i>
                <div class="card-body p-4 p-lg-5 position-relative">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-warning rounded-circle p-2 me-3 shadow-sm">
                            <i class="bi bi-heart-pulse-fill text-primary fs-5"></i>
                        </div>
                        <h5 class="fw-bold mb-0">Le conseil santé du jour</h5>
                    </div>
                    <p class="fs-4 fw-medium lh-base mb-5" style="max-width: 90%;">"{{ $consigneAleatoire }}"</p>
                    <span class="badge bg-white bg-opacity-20 rounded-pill px-3 py-2">
                        <i class="bi bi-info-circle me-1"></i> Information préventive
                    </span>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-dark mb-4">Accès Rapide</h5>
                    <div class="d-grid gap-3">
                        <a href="#" class="btn btn-warning py-3 fw-bold text-primary rounded-3 shadow-sm btn-action">
                            <i class="bi bi-calendar-plus me-2"></i>Prendre Rendez-vous
                        </a>
                        <a href="#" class="btn btn-outline-primary py-3 fw-bold rounded-3 border-2">
                            <i class="bi bi-person-circle me-2"></i>Mon Profil Santé
                        </a>
                        <a href="#" class="btn btn-outline-secondary py-3 fw-bold rounded-3 border-dashed">
                            <i class="bi bi-file-earmark-medical me-2"></i>Mes Documents
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row mb-5 p-3">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="fw-bold mb-0 text-dark">Mon profil santé</h5>
                        <small class="text-muted" style="font-size: 0.75rem;">Derniers indicateurs de suivi</small>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-2 rounded-3">
                        <i class="bi bi-activity text-primary fs-5"></i>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small fw-medium text-muted">Pression artérielle</span>
                            <span class="fw-bold text-dark">120/80</span>
                        </div>
                        <div class="progress health-bar-light">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 60%"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small fw-medium text-muted">Glycémie</span>
                            <span class="fw-bold text-dark">0.9 <small class="unit">g/L</small></span>
                        </div>
                        <div class="progress health-bar-light">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 45%"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small fw-medium text-muted">IMC</span>
                            <span class="fw-bold text-dark">23.5</span>
                        </div>
                        <div class="progress health-bar-light">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 55%"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small fw-medium text-muted">Cholestérol</span>
                            <span class="fw-bold text-dark">1.8 <small class="unit">g/L</small></span>
                        </div>
                        <div class="progress health-bar-light">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 70%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row mb-5 ">
        <div class="col-12 mb-2">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="fw-bold text-dark mb-0">Mon profil santé</h5>
                        <small class="text-muted">
                            @if($derniereConsultation)
                            Dernière mise à jour le {{ $derniereConsultation->created_at->format('d/m/Y') }}
                            @else
                            Aucune donnée de consultation disponible
                            @endif
                        </small>
                    </div>
                    <div class="bg-light p-2 rounded-3 text-primary">
                        <i class="bi bi-activity"></i>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 border rounded-4 bg-light bg-opacity-50">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="small text-muted fw-medium">Pression artérielle</span>
                                <span class="fw-bold text-dark">{{ $derniereConsultation->tension ?? '--' }}</span>
                            </div>
                            <div class="progress" style="height: 5px; background-color: rgba(0,0,0,0.05);">
                                <div class="progress-bar bg-primary" style="width: 65%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 border rounded-4 bg-light bg-opacity-50">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="small text-muted fw-medium">Température</span>
                                <span class="fw-bold text-dark">
                                    {{ $derniereConsultation->temperature ?? '--' }}
                                    <small class="text-muted fw-normal" style="font-size: 0.7rem;">°C</small>
                                </span>
                            </div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-danger"
                                    role="progressbar"
                                    style="width: {{ $derniereConsultation->temperature ?? 0 }}%;"
                                    aria-valuenow="{{ $derniereConsultation->temperature ?? 0 }}"
                                    aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 border rounded-4 bg-light bg-opacity-50">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="small text-muted fw-medium">Rythme Cardiaque</span>
                                <span class="fw-bold text-dark">
                                    {{ $derniereConsultation->fc_bpm ?? '--' }}
                                    <small class="text-muted fw-normal" style="font-size: 0.7rem;">BPM</small>
                                </span>
                            </div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-info"
                                    role="progressbar"
                                    style="width: {{ $derniereConsultation->fc_bpm ?? 0 }}%;"
                                    aria-valuenow="{{ $derniereConsultation->fc_bpm ?? 0 }}"
                                    aria-valuemin="0"
                                    aria-valuemax="150">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 border rounded-4 bg-light bg-opacity-50">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="small text-muted fw-medium">Poids</span>
                                <span class="fw-bold text-dark">
                                    {{ $derniereConsultation->poids ?? '--' }}
                                    <small class="text-muted fw-normal" style="font-size: 0.7rem;">kg</small>
                                </span>
                            </div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-warning"
                                    role="progressbar"
                                    style="width: {{ $derniereConsultation->poids ?? 0 }}%;"
                                    aria-valuenow="{{ $derniereConsultation->poids ?? 0 }}"
                                    aria-valuemin="0"
                                    aria-valuemax="150">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #f4f7fe;
            font-family: 'Inter', sans-serif;
        }

        /* AVATAR & HEADER */
        .user-avatar-circle {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #0d6efd, #0dcaf0);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.85rem;
            cursor: pointer;
        }

        /* ALERTE RDV */
        .alert-appointment {
            background-color: #0d6efd !important;
            border-radius: 1.25rem;
            padding: 1.5rem;
        }

        .icon-container-alert {
            background-color: rgba(255, 255, 255, 0.2);
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .alert-appointment .bi-bell-fill {
            animation: ring 4s infinite;
        }

        /* STAT CARDS */
        .card-stat {
            transition: all 0.3s ease;
            cursor: default;
        }

        .card-stat:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08) !important;
        }

        .stat-icon-bg {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
        }

        .bg-primary-soft {
            background-color: #eef4ff;
        }

        .bg-success-soft {
            background-color: #ecfdf5;
        }

        .bg-warning-soft {
            background-color: #fffbeb;
        }

        .bg-danger-soft {
            background-color: #fef2f2;
        }

        /* ANIMATIONS & BUTTONS */
        .btn-action {
            transition: all 0.3s ease;
        }

        .btn-action:hover {
            transform: scale(1.02);
            filter: brightness(1.05);
        }

        .border-dashed {
            border-style: dashed !important;
            border-width: 2px;
        }

        @keyframes ring {

            0%,
            25%,
            100% {
                transform: rotate(0);
            }

            5% {
                transform: rotate(15deg);
            }

            10% {
                transform: rotate(-15deg);
            }

            15% {
                transform: rotate(10deg);
            }

            20% {
                transform: rotate(-10deg);
            }
        }

        .bi-heart-pulse-fill {
            animation: pulse-soft 2.5s infinite;
        }

        @keyframes pulse-soft {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.15);
            }
        }

        .dropdown-menu {
            animation: slideIn 0.2s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }



        /* Style des barres de santé */
        /* Fond des barres sur thème clair */
        .health-bar-light {
            background-color: #f0f2f5 !important;
            /* Gris très clair pour le fond */
            height: 6px !important;
            border-radius: 10px;
            border: none;
        }

        .health-bar-light .progress-bar {
            border-radius: 10px;
        }

        /* Style des unités */
        .unit {
            font-size: 0.7rem;
            color: #6c757d;
            font-weight: 400;
        }

        /* Ombre douce pour correspondre à tes autres cartes */
        .card.shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    @endsection