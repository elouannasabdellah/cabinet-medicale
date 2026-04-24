<div class="p-4" style="background-color: #f8fafc;">
  
        <div class="mb-4">
    <div class="row g-3  align-items-end">
        
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <label class="form-label small fw-bold text-secondary mb-2 ms-1">Statut</label>
            <select wire:model.live="status" class="form-select custom-input py-2 px-3">
                <option value="">Tous les statuts</option>
                <option value="confirmed">Confirmé</option>
                <option value="pending">En attente</option>
                <option value="canceled">Annulé</option>
            </select>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <label class="form-label small fw-bold text-secondary mb-2 ms-1">Médecin</label>
            <select wire:model.live="doctorId" class="form-select custom-input py-2 px-3">
                <option value="">Choisir un médecin</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">Dr. {{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <label class="form-label small fw-bold text-secondary mb-2 ms-1">Période</label>
            <input type="date" wire:model.live="dateFilter" class="form-control custom-input py-2 px-3">
        </div>

    </div>
</div>

<style>
    /* Style personnalisé pour un look épuré et pro */
    .custom-input {
        border: 1px solid #e0e6ed !important;
        border-radius: 10px !important;
        background-color: #ffffff !important;
        color: #495057 !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02) !important;
        transition: all 0.2s ease-in-out !important;
    }

    .custom-input:focus {
        border-color: #3b82f6 !important; /* Bleu pro */
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
        outline: none !important;
    }

    /* Aligne l'icône calendrier sur le champ date proprement */
    input[type="date"]::-webkit-calendar-picker-indicator {
        cursor: pointer;
        opacity: 0.6;
    }
</style>

    <div>
            <div class="d-flex gap-2 mb-4">
            <button wire:click="setTab('upcoming')" class="btn btn-white shadow-sm border py-2 px-3 {{ $activeTab === 'upcoming' ? 'bg-white border-primary' : 'bg-white text-muted' }} " style="border-radius: 10px; background: white;">
                <i class="bi bi-calendar-event me-2"></i> À venir 
                <span class="badge bg-primary ms-2 rounded-circle">{{ $counts['upcoming'] }}</span>
            </button>
            <button wire:click="setTab('past')" class="btn btn-white shadow-sm border py-2 px-3 {{ $activeTab === 'past' ? 'border-secondary' : 'text-muted' }} text-muted" style="border-radius: 10px; background: white;">
                <i class="bi bi-clock-history me-2"></i> Passés 
                <span class="badge bg-secondary ms-2 rounded-circle">{{ $counts['past'] }}</span>
            </button>
            <button wire:click="setTab('canceled')" class="btn btn-white shadow-sm border py-2 px-3 {{ $activeTab === 'canceled' ? 'bg-white border-danger' : 'bg-white text-muted' }} text-muted" style="border-radius: 10px; background: white;">
                <i class="bi bi-x-circle me-2"></i> Annulés 
                <span class="badge bg-danger ms-2 rounded-circle">{{ $counts['canceled'] }}</span>
            </button>
        </div>

    </div>
    <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="bg-light">
                    <tr class="text-muted small fw-bold">
                        <th class="ps-4 py-3">DATE & HEURE</th>
                        <th class="py-3">MÉDECIN</th>
                        <th class="py-3">MOTIF</th>
                        <th class="py-3">STATUT</th>
                        {{-- <th class="text-center py-3">ACTIONS</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $app)
                    <tr wire:key="app-{{ $app->id }}" style="border-bottom: 1px solid #f1f5f9;">
                        <td class="ps-4 py-3">
                            <div class="fw-bold">{{ \Carbon\Carbon::parse($app->date)->translatedFormat('D. d M. Y') }}</div>
                            <small class="text-muted"><i class="bi bi-clock me-1"></i> {{ $app->time }}</small>
                        </td>
                        <td class="py-3">
                            <div class="fw-bold text-dark">Dr. {{ $app->doctor->name }}</div>
                            <small class="text-muted">{{ $app->doctor->specialty }}</small>
                        </td>
                        <td class="py-3 text-muted small">{{ $app->reason ?? 'Consultation générale' }}</td>
                        <td class="py-3">
                            @php
                                $statusClass = [
                                    'confirmed' => 'bg-success-subtle text-success',
                                    'pending' => 'bg-warning-subtle text-warning',
                                    'canceled' => 'bg-danger-subtle text-danger'
                                ][$app->status] ?? 'bg-light text-muted';
                                
                                $statusLabel = [
                                    'confirmed' => 'Confirmé',
                                    'pending' => 'En attente',
                                    'canceled' => 'Annulé'
                                ][$app->status] ?? $app->status;
                            @endphp
                            <span class="badge rounded-pill px-3 py-2 {{ $statusClass }}">
                                {{ $statusLabel }}
                            </span>
                        </td>
                        {{-- <td class="text-center py-3">
                            <button class="btn btn-sm btn-outline-info border-light-subtle me-1" style="width: 32px;"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-danger border-light-subtle" style="width: 32px;"><i class="bi bi-x-lg"></i></button>
                        </td> --}}
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted small">Aucun rendez-vous trouvé.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="p-3 bg-light d-flex justify-content-between align-items-center">
            <!-- <span class="small text-muted">
                Affichage de à résultats
            </span>
            <div>
              
            </div> -->
           
        </div>
           
    </div>
                 <div class="p-3 d-flex justify-content-center">
                    {{ $appointments->links(data: ['showInfo' => false]) }}
                </div>

    <style>
        /* Styles personnalisés pour correspondre à ton image */
        .active-tab { border-bottom: 2px solid #0dcafm !important; }
        .bg-success-subtle { background-color: #dcfce7 !important; }
        .text-success { color: #166534 !important; }
        .bg-warning-subtle { background-color: #fef9c3 !important; }
        .text-warning { color: #854d0e !important; }
        .bg-danger-subtle { background-color: #fee2e2 !important; }
        .text-danger { color: #991b1b !important; }
        .breadcrumb-item + .breadcrumb-item::before { content: "/"; }
    </style>
</div>


