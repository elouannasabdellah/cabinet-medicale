<?php

use Livewire\Volt\Component;

use App\Models\Availability;
use App\Models\Doctor;
use App\Models\Appointment;

new class extends Component {
    public $currentStep = 1;
    
    // Données du rendez-vous
    // On utilise l'ID du docteur pour la base de données
    public $selectedDoctorId = null;
    public $selectedDoctorName = null; 
    public $selectedDate = null;
    public $selectedTime = null;
    
    // Informations Patient
    public $nom = '';
    public $telephone = '';
    public $motif = '';

    // public $timeslots = ['09:00', '10:00', '11:00', '14:00', '15:00', '16:00'];

    // Utilisation de with() pour charger les données dynamiques

    public function with(): array {
        return [
            'doctors' => Doctor::all(),
            
            // On récupère les dates uniques disponibles pour le docteur choisi
            // 'availableDates' => $this->selectedDoctorId 
            //     ? Availability::where('doctor_id', $this->selectedDoctorId)
            //         ->where('is_booked', false)
            //         ->where('available_date', '>=', now()->toDateString())
            //         ->distinct()
            //         ->pluck('available_date') 
            //     : [],
        
        'availableDates' => $this->selectedDoctorId 
        ? collect(range(0, 8)) // On génère 30 jours à partir d'aujourd'hui
            ->map(fn($days) => now()->addDays($days)) // On ajoute 0 jour, 1 jour, 2 jours...
            ->filter(function($date) {
                // ÉTAPE CRUCIALE : On vérifie si ce jour futur correspond à un jour 
                // de la semaine où le docteur a un planning (Lundi, Mardi...)
                return \App\Models\Availability::where('doctor_id', $this->selectedDoctorId)
                    ->whereRaw('WEEKDAY(available_date) = WEEKDAY(?)', [$date->toDateString()])
                    ->exists();
            })
            ->map(fn($date) => [
                'full' => $date->toDateString(),           // Pour la base de données (2026-04-06)
                'day'  => $date->translatedFormat('d'),    // Le numéro (06)
                'name' => $date->translatedFormat('D'),    // Le nom (Lun.)
                ])
                ->values()
         : [],

            'availableTimes' => ($this->selectedDoctorId && $this->selectedDate)
            ? collect(\App\Models\Availability::where('doctor_id', $this->selectedDoctorId)
                ->whereRaw('WEEKDAY(available_date) = WEEKDAY(?)', [$this->selectedDate])
                // On ne prend que les lignes où is_booked est à 0 (faux)
                ->where('is_booked', false)
                ->get())
                ->flatMap(function($availability) {
                    $slots = [];
                    $current = \Illuminate\Support\Carbon::parse($availability->start_time);
                    $end = \Illuminate\Support\Carbon::parse($availability->end_time);

                            // 1. Récupérer tous les créneaux déjà réservés pour ce jour/docteur en UNE SEULE FOIS
                          $bookedTimes = \App\Models\Appointment::where('doctor_id', $this->selectedDoctorId)
                        ->where('date', $this->selectedDate)
                        ->pluck('time') // Récupère une liste : ["09:00", "10:30"...]
                        ->toArray();

                        while ($current->lt($end)) {
                        $timeString = $current->format('H:i');

                            $isToday = $this->selectedDate === now()->toDateString();
                            // On force la comparaison avec l'heure de l'Afrique/Casablanca (Maroc)
                            $now = now('Africa/Casablanca');
                            // On crée un objet Carbon qui combine la date choisie et l'heure du slot
                            // pour être sûr que la comparaison avec now() soit exacte
                            $slotDateTime = \Illuminate\Support\Carbon::parse($this->selectedDate . ' ' . $timeString, 'Africa/Casablanca');

                             $isFuture = !$isToday || $slotDateTime->gt($now);
                        
                            // On n'ajoute le créneau que s'il est LIBRE
                          if (!in_array($timeString, $bookedTimes) && $isFuture) {
                                $slots[] = $timeString;
                            }

                             $current->addMinutes($availability->duration);
                    }

                    //     $current->addMinutes($availability->duration); // Utilise les 30 min de la base
                    // }
                    return $slots;
                })
                ->values()
             : [],
        ];
    }


    public function selectDoctor($id, $name) {
        $this->selectedDoctorId = $id;
        $this->selectedDoctorName = $name;
        $this->selectedDate = null; // Reset si on change de docteur
        $this->selectedTime = null;

    
    }
  

    public function selectDate($date) {
        $this->selectedDate = $date;
        $this->selectedTime = null; // Reset l'heure si on change de date
    }
          public $showError = false; 

        public function nextStep() {
                if ($this->currentStep == 1 && !$this->selectedDoctorId) {
            // Optionnel : ajouter un message d'erreur ici
               
              return; 
             }   
             if ($this->currentStep == 3) {
                if (empty($this->nom) || empty($this->telephone || $this->motif)) {
                    $this->showError = true; // On l'affiche SEULEMENT si c'est vide
                    return;
                }
          }
            if ($this->currentStep < 4){
                $this->currentStep++;
                $this->showError = false; // On reset pour l'étape suivante
            }
    }

    public function previousStep() {
        if ($this->currentStep > 1) $this->currentStep--;
    }

 public function confirmer() {

        $this->validate([
            'selectedDoctorId' => 'required',
            'selectedDate' => 'required',
            'selectedTime' => 'required',
            'nom' => 'required',
            'telephone' => 'required',
        ]);

        // 1. Créer le rendez-vous
        Appointment::create([
            // 'user_id' => auth()->id(),
            'doctor_id' => $this->selectedDoctorId,
            'date' => $this->selectedDate,
            'time' => $this->selectedTime,
            'patient_name'  => $this->nom,
            'patient_phone' => $this->telephone,
            'reason' => $this->motif,
            'status'    => 'pending',
            'patient_id'    => auth()->user()->patient->id,
        ]);

        // 2. Marquer la disponibilité comme "réservée" (is_booked = 1)
        Availability::where('doctor_id', $this->selectedDoctorId)
            // ->where('available_date', $this->selectedDate)
            ->whereRaw('WEEKDAY(available_date) = WEEKDAY(?)', [$this->selectedDate])
           ->where('start_time', $this->selectedTime) // On utilise start_time comme vu en base
            ->update(['is_booked' => true]);

        //session()->flash('message', 'Rendez-vous confirmé !');
        return redirect()->to('/patient/dashboard');

    }

}; ?>


{{-- <div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-5 px-4">
        @foreach(['Médecin', 'Date & Heure', 'Informations', 'Confirmation'] as $index => $label)
            <div class="text-center">
                <div class="rounded-circle {{ $currentStep >= ($index + 1) ? 'bg-primary text-white' : 'bg-light text-muted' }} d-flex align-items-center justify-content-center mx-auto mb-2" style="width:40px; height:40px;">
                    @if($currentStep > ($index + 1)) ✓ @else {{ $index + 1 }} @endif
                </div>
                <small class="{{ $currentStep == ($index + 1) ? 'fw-bold text-primary' : '' }}">{{ $label }}</small>
            </div>
            @if($index < 3)
                <div class="flex-fill border-top mb-4 {{ $currentStep >= ($index + 2) ? 'border-primary' : '' }}"></div>
            @endif
        @endforeach
    </div>

    @if($currentStep == 1)
        <h5 class="mb-4">Choisir un médecin</h5>
        <div class="row">
            @foreach($doctors as $doc)
                <div class="col-md-3 mb-3">
                    <div wire:click="selectDoctor({{ $doc->id }}, '{{ $doc->name }}')" 
                         class="card text-center p-3 shadow-sm" 
                         style="cursor:pointer; border: {{ $selectedDoctorId == $doc->id ? '2px solid #0d6efd' : '1px solid #dee2e6' }};">
                        <div class="rounded-circle {{ $doc->color ?? 'bg-primary' }} text-white mx-auto mb-2" style="width:50px;height:50px;line-height:50px;">
                            {{ substr($doc->name, 0, 1) }}
                        </div>
                        <strong>Dr. {{ $doc->name }}</strong><br>
                        <small class="text-muted">{{ $doc->specialty }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if($currentStep == 2)
        <h5 class="mb-4">Disponibilités de Dr. {{ $selectedDoctorName }}</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label font-weight-bold">1. Choisir une date :</label>
                <div class="list-group">
                    @forelse($availableDates as $date)
                        <button wire:click="selectDate('{{ $date['full'] }}')" 
                                class="list-group-item list-group-item-action {{ $selectedDate == $date ? 'active' : '' }}">
                            {{ \Carbon\Carbon::parse($date['full'])->format('d/m/Y') }}
                        </button>
                    @empty
                        <p class="text-danger">Aucune date disponible pour ce médecin.</p>
                    @endforelse
                </div>
            </div>
            
            @if($selectedDate)
            <div class="col-md-6">
                <label class="form-label font-weight-bold">2. Choisir une heure :</label>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($availableTimes as $time)
                        <button wire:click="$set('selectedTime', '{{ $time }}')" 
                                class="btn {{ $selectedTime == $time ? 'btn-primary' : 'btn-outline-primary' }} px-3">
                            {{ $time }}
                        </button>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    @endif

    @if($currentStep == 3)
        <h5 class="mb-4">Vos Informations</h5>

            @if($showError)
                <div class="alert alert-danger py-3 small">
                    Veuillez remplir vos Information pour continuer.
                </div>
            @endif

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nom complet :</label>
                <input type="text" wire:model="nom" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Téléphone :</label>
                <input type="text" wire:model="telephone" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">Motif :</label>
                <textarea wire:model="motif" class="form-control" rows="3"></textarea>
            </div>
        </div>
    @endif

    @if($currentStep == 4)
        <h5 class="mb-4">Récapitulatif</h5>
        <div class="alert alert-info border p-4">
            <p><strong>Médecin :</strong> Dr. {{ $selectedDoctorName }}</p>
            <p><strong>Date :</strong> {{ $selectedDate }} à {{ $selectedTime }}</p>
            <p><strong>Patient :</strong> {{ $nom }} ({{ $telephone }})</p>
        </div>
    @endif

    <div class="d-flex justify-content-between mt-5 pt-3 border-top">
        @if($currentStep > 1)
            <button wire:click="previousStep" class="btn btn-outline-secondary px-4">← Retour</button>
        @else
            <div></div>
        @endif

        @if($currentStep < 4)
            <button wire:click="nextStep" class="btn btn-primary px-4" 
                {{ ($currentStep == 1 && !$selectedDoctorId) || ($currentStep == 2 && (!$selectedDate || !$selectedTime))
                ? 'disabled' : '' }}>
                Suivant →
            </button>
        @else
            <button wire:click="confirmer" class="btn btn-success px-4">Confirmer le RDV ✓</button>
        @endif
    </div>
</div> --}}

<div class="card p-3 p-md-4 shadow-sm border-0" style="border-radius: 15px;">
    <div class="d-flex justify-content-between align-items-center mb-4 mb-md-5 px-1 px-md-4">
        @foreach(['Médecin', 'Date', 'Infos', 'Fin'] as $index => $label)
            <div class="text-center d-flex flex-column align-items-center flex-fill">
                <div class="rounded-circle {{ $currentStep >= ($index + 1) ? 'bg-primary text-white shadow' : 'bg-light text-muted' }} d-flex align-items-center justify-content-center mb-2" 
                     style="width:35px; height:35px; min-width: 35px; font-size: 14px; transition: all 0.3s ease;">
                    @if($currentStep > ($index + 1)) <i class="bi bi-check-lg"></i> @else {{ $index + 1 }} @endif
                </div>
                <small class="d-none d-sm-block {{ $currentStep == ($index + 1) ? 'fw-bold text-primary' : 'text-muted' }}" style="font-size: 12px;">
                    {{ $label }}
                </small>
            </div>
            @if($index < 3)
                <div class="flex-fill border-top mb-3 {{ $currentStep >= ($index + 2) ? 'border-primary border-2' : '' }}" style="transition: all 0.5s ease;"></div>
            @endif
        @endforeach
    </div>

    @if($currentStep == 1)
        <h5 class="mb-4 fw-bold"><i class="bi bi-person-badge me-2"></i>Choisir un médecin</h5>
        <div class="row g-3">
            @foreach($doctors as $doc)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div wire:click="selectDoctor({{ $doc->id }}, '{{ $doc->name }}')" 
                         class="card h-100 text-center p-3 transition-hover {{ $selectedDoctorId == $doc->id ? 'border-primary bg-light-primary' : 'border-light shadow-sm' }}" 
                         style="cursor:pointer; border-width: 2px; border-radius: 12px;">
                        <div class="rounded-circle {{ $doc->color ?? 'bg-primary' }} text-white mx-auto mb-3 d-flex align-items-center justify-content-center shadow" style="width:60px;height:60px; font-size: 1.5rem; font-weight: bold;">
                            {{ substr($doc->name, 0, 1) }}
                        </div>
                        <h6 class="mb-1 fw-bold">Dr. {{ $doc->name }}</h6>
                        <small class="text-muted">{{ $doc->specialty }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if($currentStep == 2)
        <h5 class="mb-4 fw-bold">Disponibilités : Dr. {{ $selectedDoctorName }}</h5>
        <div class="row g-4">
            <div class="col-md-5">
                <label class="form-label fw-bold text-secondary small">1. Choisir une date :</label>
                <div class="list-group list-group-flush border rounded-3 overflow-auto shadow-sm" style="max-height: 300px;">
                    @forelse($availableDates as $date)
                        <button wire:click="selectDate('{{ $date['full'] }}')" 
                                class="list-group-item list-group-item-action py-3 border-0 border-bottom {{ $selectedDate == $date['full'] ? 'bg-primary text-white active' : '' }}">
                            <i class="bi bi-calendar3 me-2"></i> {{ \Carbon\Carbon::parse($date['full'])->translatedFormat('d F Y') }}
                        </button>
                    @empty
                        <div class="p-3 text-danger small">Aucune date disponible.</div>
                    @endforelse
                </div>
            </div>
            
            <div class="col-md-7">
                @if($selectedDate)
                    <label class="form-label fw-bold text-secondary small">2. Choisir une heure :</label>
                    <div class="row row-cols-3 row-cols-sm-4 row-cols-md-3 row-cols-lg-4 g-2">
                        @foreach($availableTimes as $time)
                            <div class="col">
                                <button wire:click="$set('selectedTime', '{{ $time }}')" 
                                        class="btn w-100 py-2 {{ $selectedTime == $time ? 'btn-primary' : 'btn-outline-primary' }} rounded-3 shadow-sm border-2">
                                    {{ $time }}
                                </button>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="h-100 d-flex align-items-center justify-content-center border rounded-3 bg-light p-4">
                        <small class="text-muted italic">Veuillez sélectionner une date à gauche</small>
                    </div>
                @endif
            </div>
        </div>
    @endif

    @if($currentStep == 3)
        <h5 class="mb-4 fw-bold">Vos Informations</h5>
        @if($showError)
            <div class="alert alert-danger border-0 shadow-sm py-2 small mb-4">
                <i class="bi bi-exclamation-circle me-2"></i>Veuillez remplir tous les champs.
            </div>
        @endif
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <label class="form-label small fw-bold">Nom complet</label>
                <input type="text" wire:model="nom" class="form-control form-control-lg border-light-subtle bg-light shadow-sm fs-6" placeholder="Ex: Jean Dupont">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label small fw-bold">Téléphone</label>
                <input type="text" wire:model="telephone" class="form-control form-control-lg border-light-subtle bg-light shadow-sm fs-6" placeholder="06XXXXXXXX">
            </div>
            <div class="col-12">
                <label class="form-label small fw-bold">Motif de consultation</label>
                <textarea wire:model="motif" class="form-control border-light-subtle bg-light shadow-sm fs-6" rows="3" placeholder="Décrivez brièvement..."></textarea>
            </div>
        </div>
    @endif

    @if($currentStep == 4)
        <h5 class="mb-4 fw-bold text-center">Récapitulatif de votre RDV</h5>
        <div class="card bg-light border-0 p-4 shadow-sm" style="border-radius: 12px;">
            <div class="d-flex align-items-center mb-3">
                <div class="bg-primary-subtle p-2 rounded-3 me-3 text-primary"><i class="bi bi-person-heart fs-4"></i></div>
                <div>
                    <div class="small text-muted">Docteur</div>
                    <div class="fw-bold">Dr. {{ $selectedDoctorName }}</div>
                </div>
            </div>
            <div class="d-flex align-items-center mb-3">
                <div class="bg-success-subtle p-2 rounded-3 me-3 text-success"><i class="bi bi-clock-history fs-4"></i></div>
                <div>
                    <div class="small text-muted">Date & Heure</div>
                    <div class="fw-bold">{{ \Carbon\Carbon::parse($selectedDate)->format('d/m/Y') }} à {{ $selectedTime }}</div>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div class="bg-warning-subtle p-2 rounded-3 me-3 text-warning"><i class="bi bi-person fs-4"></i></div>
                <div>
                    <div class="small text-muted">Patient</div>
                    <div class="fw-bold">{{ $nom }} <span class="text-muted fw-normal">({{ $telephone }})</span></div>
                </div>
            </div>
        </div>
    @endif

    <div class="d-flex justify-content-between mt-5 pt-3 border-top">
        <button wire:click="previousStep" class="btn btn-light px-4 py-2 fw-bold text-secondary {{ $currentStep == 1 ? 'invisible' : '' }}">
            <i class="bi bi-arrow-left me-2"></i>Retour
        </button>

        @if($currentStep < 4)
            <button wire:click="nextStep" class="btn btn-primary px-4 py-2 fw-bold shadow-sm" 
                {{ ($currentStep == 1 && !$selectedDoctorId) || ($currentStep == 2 && (!$selectedDate || !$selectedTime)) ? 'disabled' : '' }}>
                Suivant<i class="bi bi-arrow-right ms-2"></i>
            </button>
        @else
            <button wire:click="confirmer" class="btn btn-success px-4 py-2 fw-bold shadow-sm">
                Confirmer le RDV<i class="bi bi-check2-circle ms-2"></i>
            </button>
        @endif
    </div>
</div>

<style>
    /* Effets de transition et hover */
    .transition-hover { transition: all 0.3s cubic-bezier(.25,.8,.25,1); }
    .transition-hover:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
    .bg-light-primary { background-color: rgba(13, 110, 253, 0.05); }
    .bg-primary-subtle { background-color: #e7f1ff; }
    .bg-success-subtle { background-color: #e1f7ec; }
    .bg-warning-subtle { background-color: #fff8e6; }
    .form-control:focus { box-shadow: none; border-color: #0d6efd; background-color: white !important; }
    
    @media (max-width: 576px) {
        .btn-lg { font-size: 1rem; }
    }
</style>

