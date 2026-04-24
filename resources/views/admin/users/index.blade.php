@extends('layouts.admin')

@section('content')

    {{-- alert --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {

        @if(session("success"))
        Swal.fire({
            icon: 'success',
            title: 'Succès !',
            text: "{{ session('success') }}",
            confirmButtonColor: '#00b894',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
            background: '#ffffff',
            customClass: {
                popup: 'rounded-4 border-0'
            }
        });
        @endif
        // Alerte d'Erreur
        @if(session("error"))
        Swal.fire({
            icon: 'error',
            title: 'Oups...',
            text: "{{ session('error') }}",
            confirmButtonColor: '#d63031',
            background: '#ffffff',
            customClass: {
                popup: 'rounded-4 border-0'
            }
        });
        @endif

    });
</script>

<div class="container-fluid py-4">
    <div class="d-md-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark h4 mb-1">Gestion Utilisateurs</h2> <p class="text-muted small mb-0">Interface d'administration</p>
        </div>
       <form action="{{ route('admin.users.index') }}" method="GET" class="d-flex gap-2 align-items-center">
        <div class="input-group shadow-sm border-0" style="max-width: 300px;">
            <span class="input-group-text bg-white border-0"><i class="bi bi-search text-muted"></i></span>
            
            <input type="text" name="search" class="form-control border-0 ps-0" 
                placeholder="Rechercher un utilisateur..." 
                value="{{ request('search') }}">
        </div>
            
        <button type="submit" class="btn btn-emerald text-white px-4">
            Rechercher
        </button>

        {{-- @if(request('search')) --}}
           <a href="{{ route('admin.users.index') }}" class="btn btn-light rounded-circle shadow-sm ms-2" title="Effacer la recherche">
            <i class="bi bi-arrow-counterclockwise text-muted"></i>
            </a>
        {{-- @endif --}}
    </form>
    </div>

    <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light-emerald">
                    <tr>
                        <th class="ps-4 border-0 text-emerald small text-uppercase py-3 fw-bold">Utilisateur</th>
                        <th class="border-0 text-emerald small text-uppercase py-3 fw-bold">Rôle</th>
                        <th class="border-0 text-emerald small text-uppercase py-3 fw-bold text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-emerald text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 40px; height: 40px; font-weight: 600;">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0">{{ $user->name }}</div>
                                    <small class="text-muted">{{ $user->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if($user->role == 'admin')
                                <span class="badge rounded-pill bg-emerald-subtle text-emerald px-3 py-2">Administrateur</span>
                            @else
                                <span class="badge rounded-pill bg-light text-muted px-3 py-2">{{ ucfirst($user->role) }}</span>
                            @endif
                        </td>
                        <td class="text-end pe-4">
                            {{-- <button class="btn btn-sm btn-light rounded-circle"><i class="bi bi-pencil text-emerald"></i></button> --}}

                            {{-- Formulaire de suppression --}}
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light rounded-circle ms-1 shadow-sm border-0" title="Supprimer l'utilisateur">
                                        <i class="bi bi-trash text-danger"></i>
                                    </button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0 py-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div class="text-muted small">
            Affichage de <b>{{ $users->firstItem() }}</b> à <b>{{ $users->lastItem() }}</b> sur <b>{{ $users->total() }}</b> utilisateurs
        </div>
        
        <div class="pagination-emerald">
            {{ $users->appends(['search' => request('search')])->links() }}
        </div>
    </div>
</div>
</div>


<style>
    /* Palette de couleurs basée sur le bouton "Tableau de bord" */
    .btn-emerald, .bg-emerald {
        background-color: #10b981 !important; /* Le vert émeraude exact de l'image 7 */
        border: none;
    }
    
    .text-emerald {
        color: #10b981 !important;
    }

    .bg-emerald-subtle {
        background-color: rgba(16, 185, 129, 0.1) !important;
    }

    .bg-light-emerald {
        background-color: #f0fdf4 !important; /* Vert très clair pour l'en-tête */
    }

    .form-control:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 0.25 row rgba(16, 185, 129, 0.25);
    }

    /* Customisation de la pagination aux couleurs du Cabinet Médical */
    .pagination-emerald .pagination {
        margin-bottom: 0;
        gap: 5px;
    }

    .pagination-emerald .page-link {
        border: none;
        border-radius: 8px !important;
        color: #10b981; /* Couleur émeraude */
        padding: 8px 16px;
        transition: all 0.3s ease;
    }

    .pagination-emerald .page-item.active .page-link {
        background-color: #10b981 !important; /* Couleur active */
        color: white !important;
        box-shadow: 0 4px 10px rgba(16, 185, 129, 0.2);
    }

    .pagination-emerald .page-link:hover {
        background-color: rgba(16, 185, 129, 0.1);
        color: #059669;
    }
</style>
@endsection