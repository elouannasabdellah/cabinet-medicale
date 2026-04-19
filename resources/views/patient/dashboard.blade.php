@extends('layouts.patient')

@section('page-content')
<!-- <div class="d-flex justify-content-between align-items-center bg-white shadow-sm border-bottom w-100" 
     style="padding: 1rem 2rem; position: sticky; top: 0; z-index: 1020;">
    
    <div>
        <h2 class="fw-bold mb-0 h3" style="color: #1a202c;">Tableau de bord</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-info">Accueil</a></li>
                <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
        </nav>
    </div>

    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-light rounded-circle position-relative border-0 shadow-sm" style="width: 40px; height: 40px; background: #f8f9fa;">
            <i class="bi bi-bell text-muted"></i>
            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle" style="margin-left: -8px; margin-top: 8px;"></span>
        </button>

        <div class="dropdown">
            <div class="rounded-circle bg-info text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" 
                 id="userMenu" data-bs-toggle="dropdown" 
                 style="width: 45px; height: 45px; cursor: pointer; font-size: 0.9rem;">
                {{ substr(Auth::user()->name, 0, 2) }}
            </div>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" style="border-radius: 10px;">
                <li><a class="dropdown-item py-2" href="{{ route('profile.edit') }}"><i class="bi bi-person me-2"></i> Profil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item py-2 text-danger fw-bold"><i class="bi bi-power me-2"></i> Déconnexion</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div> -->



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

        <div class="dropdown">
            <div class="d-flex align-items-center gap-2 cursor-pointer" id="userMenu" data-bs-toggle="dropdown" style="cursor: pointer;">
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" 
                     style="width: 40px; height: 40px; font-size: 0.85rem; background: linear-gradient(45deg, #0d6efd, #0dcaf0);">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                <!-- <div class="d-none d-md-block">
                    <div class="fw-bold small" style="line-height: 1;">{{ Auth::user()->name }}</div>
                    <small class="text-muted" style="font-size: 0.7rem;">Patient</small>
                </div> -->
            </div>
            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-3 py-2" style="border-radius: 12px; min-width: 200px;">
                <li><a class="dropdown-item py-2" href="{{ route('profile.edit') }}"><i class="bi bi-person me-2"></i> Mon Profil</a></li>
                <li><a class="dropdown-item py-2" href="#"><i class="bi bi-calendar-event me-2"></i> Mes RDVs</a></li>
                <li><hr class="dropdown-divider mx-2"></li>
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

<style>
    /* CSS Additionnel pour le look pro */
    .bg-light-blue { background-color: #f0f7ff !important; }
    .bg-primary-soft { background-color: #e1efff; color: #0d6efd; }
    .dropdown-item:active { background-color: #f8f9fa; color: #000; }
    .cursor-pointer { cursor: pointer; }
    .dropdown-menu { animation: fadeIn 0.2s ease-out; }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>



<div class="container-fluid px-4 mt-4">
    
        @if($prochainRDV)
        <div class="alert bg-info text-white rounded-4 p-2 mb-3 d-flex justify-content-between align-items-center shadow-sm border-0">
            <div class="d-flex align-items-center">
                <div class="bg-white bg-opacity-25 rounded-circle p-3 me-3">
                    <i class="bi bi-bell-fill fs-3"></i>
                </div>
                <div>
                    <h5 class="mb-1 fw-bold">Prochain rendez-vous le {{ \Carbon\Carbon::parse($prochainRDV->date)->format('d/m/Y') }} : <span>{{$prochainRDV->time}}</span> </h5>
                    <p class="mb-0 opacity-75">N'oubliez pas de vous présenter 15 minutes à l'avance.</p> 
                </div>
            </div>
        </div>
    @else
        <div class="alert bg-info text-white rounded-4 p-4 mb-4 d-flex justify-content-between align-items-center shadow-sm border-0"> 
            <div class="d-flex align-items-center">
                <div class="bg-white bg-opacity-25 rounded-circle p-2 me-3">
                    <i class="bi bi-calendar-x fs-3"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold">Aucun rendez-vous prévu pour le moment.</h5>
                </div>
            </div>
        </div>
    @endif

    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100">
                <div class="bg-info bg-opacity-10 rounded-3 p-2 mb-3" style="width: fit-content;">
                    <i class="bi bi-calendar-event text-info fs-4"></i>
                </div>
                <h2 class="fw-bold mb-1" style="color: #2c3e50;">3</h2>
                <p class="text-muted small mb-0">RDV à venir</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100">
                <div class="bg-success bg-opacity-10 rounded-3 p-2 mb-3" style="width: fit-content;">
                    <i class="bi bi-check-circle text-success fs-4"></i>
                </div>
                <h2 class="fw-bold mb-1" style="color: #2c3e50;">12</h2>
                <p class="text-muted small mb-0">Consultations effectuées</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100">
                <div class="bg-warning bg-opacity-10 rounded-3 p-2 mb-3" style="width: fit-content;">
                    <i class="bi bi-file-earmark-text text-warning fs-4"></i>
                </div>
                <h2 class="fw-bold mb-1" style="color: #2c3e50;">5</h2>
                <p class="text-muted small mb-0">Ordonnances actives</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100">
                <div class="bg-danger bg-opacity-10 rounded-3 p-2 mb-3" style="width: fit-content;">
                    <i class="bi bi-x-circle text-danger fs-4"></i>
                </div>
                <h2 class="fw-bold mb-1 text-danger">1</h2>
                <p class="text-muted small mb-0">Annulations</p>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    /* Supprime les marges du layout pour coller le header */
    .container-fluid.px-4:first-child { padding-top: 0 !important; }
    
    body { background-color: #f8f9fa; }
    .card { transition: transform 0.2s; border: none; }
    .card:hover { transform: translateY(-5px); }
    .rounded-4 { border-radius: 1rem !important; }
    
    /* Couleur info personnalisée pour correspondre à ton design */
    .bg-info { background-color: #0dcaf0 !important; }
    .text-info { color: #0dcaf0 !important; }
</style>
@endsection