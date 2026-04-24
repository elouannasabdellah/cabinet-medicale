@extends('layouts.app')

@section('content')

<div class="d-flex">

    <div class="sidebar d-flex flex-column p-4 text-white" 
         style="width: 280px; height: 100vh; background-color: #0b1e2d; font-family: 'Inter', sans-serif; position: fixed; left: 0; top: 0; z-index: 1000; border-right: 1px solid rgba(255,255,255,0.05);">    
        
        <div class="mb-5 px-2">
            <h5 class="fw-bold mb-0" style="letter-spacing: -0.5px; color: #fff;">Cabinet Médical</h5>
            <small class="text-muted opacity-75">Espace Patient</small>
        </div>

        <div class="sidebar-heading px-2 mb-3 text-uppercase" style="font-size: 0.7rem; opacity: 0.5; letter-spacing: 1px; font-weight: 600;">
            Principal
        </div>
        <ul class="nav nav-pills flex-column mb-4" style="gap: 8px;"> {{-- Ajout d'espace entre les éléments --}}
            <li class="nav-item">
                <a href="{{ route('patient.dashboard') }}" 
                   class="nav-link text-white d-flex align-items-center gap-3 py-2.5 px-3 rounded-3 {{ request()->routeIs('patient.dashboard') ? 'bg-primary' : 'opacity-75 hover-opacity' }}">
                    <i class="bi bi-grid-fill fs-5"></i> 
                    <span>Tableau de bord</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('patient.rdv-create') }}" 
                   class="nav-link text-white d-flex align-items-center justify-content-between py-2.5 px-3 rounded-3 {{ request()->routeIs('patient.rdv-create') ? 'bg-primary' : 'opacity-75 hover-opacity' }}">
                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-calendar-plus-fill fs-5"></i> 
                        <span>Prendre un RDV</span>
                    </div>
                    <span class="badge rounded-pill bg-warning text-dark fw-bold">+</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('patient.rdv-list') }}" 
                   class="nav-link text-white d-flex align-items-center justify-content-between py-2.5 px-3 rounded-3 {{ request()->routeIs('patient.rdv-list') ? 'bg-primary' : 'opacity-75 hover-opacity' }}">
                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-calendar2-check-fill fs-5"></i> 
                        <span>Mes Rendez-vous</span>
                    </div>
                    <span class="badge rounded-pill bg-info text-dark fw-bold">3</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-heading px-2 mb-3 mt-2 text-uppercase" style="font-size: 0.7rem; opacity: 0.5; letter-spacing: 1px; font-weight: 600;">
            Dossier Médical
        </div>
        <ul class="nav nav-pills flex-column mb-4" style="gap: 8px;">
            {{-- <li class="nav-item">
                <a href="{{ route('patient.historique') }}" 
                   class="nav-link text-white d-flex align-items-center gap-3 py-2.5 px-3 rounded-3 {{ request()->routeIs('patient.historique') ? 'bg-primary' : 'opacity-75 hover-opacity' }}">
                    <i class="bi bi-clock-history fs-5"></i> 
                    <span>Historique</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{ route('patient.ordonnance') }}" 
                   class="nav-link text-white d-flex align-items-center gap-3 py-2.5 px-3 rounded-3 {{ request()->routeIs('patient.ordonnance') ? 'bg-primary' : 'opacity-75 hover-opacity' }}">
                    <i class="bi bi-file-earmark-medical-fill fs-5"></i> 
                    <span>Ordonnances</span>
                </a>
            </li>
        </ul>

        <ul class="nav nav-pills flex-column mt-auto border-top pt-4 border-secondary border-opacity-25">
            <li class="nav-item">
               <a href="/profile" class="nav-link text-white d-flex align-items-center gap-3 py-2.5 px-3 rounded-3 opacity-75 hover-opacity">
                    <i class="bi bi-person-circle fs-4"></i> 
                    <span>Mon Profil</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="flex-grow-1" style="margin-left: 280px; min-height: 100vh; background-color: #f8fafb;">
        <div class="p-5"> {{-- Augmentation du padding pour un look plus clean --}}
            @yield('page-content')
        </div>
    </div>

</div>

<style>
    /* Petit effet de survol pour rendre le menu interactif */
    .hover-opacity:hover {
        opacity: 1 !important;
        background-color: rgba(255,255,255,0.05);
        transition: all 0.3s ease;
    }
    .nav-link i {
        min-width: 25px; /* Aligne parfaitement les icônes */
    }
</style>

@endsection