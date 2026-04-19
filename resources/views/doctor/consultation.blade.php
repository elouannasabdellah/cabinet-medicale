

 @extends('layouts.patient')

@section('page-content')

<div class="container-fluid py-4" style="background-color: #f7f9fc; min-height: 600px; font-family: 'Poppins', sans-serif;">
    
    <div class="card border-0 shadow-sm rounded-3 mx-auto main-consultation-card" style="max-width: 1000px; background-color: #fff;">
        
        {{-- 1. HEADER DYNAMIQUE DU PATIENT --}}
        <div class="p-4 border-bottom" style="border-color: #eaedf3;">
            <div class="d-flex flex-column flex-sm-row align-items-center align-items-sm-start mb-3 text-center text-sm-start">
                <div class="avatar-circle-indigo mb-3 mb-sm-0 me-sm-3 shadow-inner">
                    <span class="fw-bold">{{ strtoupper(substr($rdv->patient_name, 0, 2)) }}</span>
                </div>
                <div class="flex-grow-1">
                    <h5 class="fw-bold m-0 text-dark">{{ $rdv->patient_name }}</h5>
                    <div class="d-flex flex-wrap justify-content-center justify-content-sm-start align-items-center text-muted small mt-1 gap-2 gap-sm-3">
                        {{-- On récupère l'âge via la relation patient --}}
                        <span><i class="bi bi-person me-1"></i>{{ $rdv->patient->age ?? 'N/A' }} ans</span>
                        <span class="text-danger fw-bold"><i class="bi bi-droplet-fill me-1"></i>{{ $rdv->patient->groupe_sanguin ?? '?' }}</span>
                        @if($rdv->patient->allergies)
                            <span class="text-warning-dark fw-bold"><i class="bi bi-exclamation-triangle-fill me-1"></i>Allergie : {{ $rdv->patient->allergies }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-center justify-content-sm-start gap-2">
                <span class="badge-status-green">RDV #{{ $rdv->id }} • {{ now()->format('H:i') }} </span>
            </div>
        </div>

        <div class="p-3 p-sm-4 bg-white">
            <div class="d-flex align-items-center mb-4">
                <i class="bi bi-clipboard-pulse fs-5 text-indigo me-2"></i>
                <h6 class="fw-bold m-0 text-indigo">Compte-rendu de consultation</h6>
            </div>

            {{-- 2. DÉBUT DU FORMULAIRE --}}
            <form action="{{ route('doctor.consultation.store') }}" method="POST">
                @csrf
                
                {{-- Champs invisibles essentiels pour la base de données --}}
                <input type="hidden" name="patient_id" value="{{ $rdv->patient_id }}">
                <input type="hidden" name="doctor_id" value="{{ $rdv->doctor_id }}">
                <input type="hidden" name="rdv_id" value="{{ $rdv->id }}">

                <div class="row g-3 mb-3">
                    <div class="col-12 col-md-6">
                        <label class="form-label-epure">Motif</label>
                        <input type="text" name="motif" class="form-control-epure" value="Consultation générale">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label-epure">Diagnostic</label>
                        <input type="text" name="diagnostic" class="form-control-epure" placeholder="Saisir le diagnostic..." >
                    </div>
                    
                    <div class="col-6 col-md-3"><label class="form-label-epure">T° (°C)</label><input type="text" name="temperature" class="form-control-epure" placeholder="37.0"></div>
                    <div class="col-6 col-md-3"><label class="form-label-epure">Tension</label><input type="text" name="tension" class="form-control-epure" placeholder="12/8"></div>
                    <div class="col-6 col-md-3"><label class="form-label-epure">FC (bpm)</label><input type="text" name="fc_bpm" class="form-control-epure" placeholder="72"></div>
                    <div class="col-6 col-md-3"><label class="form-label-epure">Poids (kg)</label><input type="text" name="poids" class="form-control-epure" placeholder="75"></div>

                    <div class="col-12"><label class="form-label-epure">Observations cliniques</label><textarea name="observations" class="form-control-epure" rows="3"></textarea></div>
                </div>

                <div class="prescription-section pt-4 border-top" style="border-color: #eaedf3;">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-capsule fs-5 text-indigo me-2"></i>
                            <h6 class="fw-bold m-0 text-indigo">Prescription médicale_</h6>
                        </div>
                        {{-- On ajoute type="button" pour éviter que ce bouton ne soumette le formulaire --}}
                        <button type="button" class="btn-add-med" id="btn-ajouter-med"><i class="bi bi-plus-lg me-1"></i> Ajouter</button>
                    </div>

                    <div class="row g-3" id="liste-medicaments">
                        {{-- Les médicaments ajoutés en JS apparaîtront ici --}}
                    </div>
                </div>

                {{-- 3. BOUTONS D'ACTION --}}
                <div class="d-flex flex-column flex-sm-row justify-content-end align-items-center mt-3 pt-3 border-top gap-3" style="border-color: #eaedf3;">
                    <a href="{{ url()->previous() }}" class="btn-secondary-epure w-100 w-sm-auto order-2 order-sm-1 text-center text-decoration-none">Annuler</a>
                    <button type="submit" class="btn-primary-indigo shadow-indigo w-100 w-sm-auto order-1 order-sm-2">
                        <i class="bi bi-check-circle me-2"></i>Enregistrer la visite
                    </button>
                </div>
            </form> {{-- FIN DU FORMULAIRE --}}
        </div>
    </div>
</div>


    
   @if(session('success'))
        <script>
            Swal.fire({
                title: 'Succès !',
                text: "{{ session('success') }}",
                icon: 'success',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#ffffff',
                color: '#2d3436',
                iconColor: '#40c057',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        </script>
    @endif

<script>
    let medIndex = document.querySelectorAll('.med-item').length;

    document.getElementById('btn-ajouter-med').addEventListener('click', function() {
    const conteneur = document.getElementById('liste-medicaments');
    
    // Création de la div parente
    const nouvelleLigne = document.createElement('div');
    nouvelleLigne.className = 'col-12 mb-3 med-item';
    
    // Structure HTML calquée sur ton design
    nouvelleLigne.innerHTML = `
        <div class="med-card d-flex flex-column flex-md-row align-items-md-center gap-3 p-3" 
             style="background: #f8fafc; border: 1px solid #eaedf3; border-radius: 12px;">
            
            <div class="med-icon" style="color: #5c5cf1;"><i class="bi bi-capsule-pill fs-4"></i></div>
            
            <div class="flex-grow-1 row g-2">
                <div class="col-md-4">
                    <input type="text" name="medicaments[${medIndex}][nom]" class="form-control-epure" placeholder="Nom du médicament (ex: Doliprane)" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="medicaments[${medIndex}][posologie]" class="form-control-epure" placeholder="1 comp • 3 fois/jour">
                </div>
                <div class="col-md-4">
                    <input type="text" name="medicaments[${medIndex}][duree]" class="form-control-epure" placeholder="Durée (ex: 5 jours)">
                </div>
            </div>

            <button type="button" class="btn-delete-med text-danger border-0 bg-transparent btn-supprimer">
                <i class="bi bi-trash fs-5"></i>
            </button>
        </div>
    `;

    // Ajouter la ligne au conteneur
    conteneur.appendChild(nouvelleLigne);

    // On incrémente le compteur pour le prochain médicament
    medIndex++;
    // Fonction pour supprimer la ligne
    nouvelleLigne.querySelector('.btn-supprimer').addEventListener('click', function() {
        nouvelleLigne.remove();
    });
});
</script>

<style>
    :root {
        --indigo-main: #5c5cf1;
        --border-color: #eaedf3;
        --text-muted: #7d8ea3;
    }

    .text-indigo { color: var(--indigo-main); }
    
    /* AVATAR & BADGES */
    .avatar-circle-indigo {
        width: 60px; height: 60px; background-color: var(--indigo-main);
        color: white; border-radius: 16px; display: flex;
        align-items: center; justify-content: center; font-size: 1.5rem;
    }
    .badge-status-green {
        background-color: #ecfdf5; color: #10b981; padding: 5px 15px;
        border-radius: 8px; font-size: 0.75rem; font-weight: 700; border: 1px solid #c1fae9;
    }

    /* FORMULAIRE */
    .form-label-epure { font-size: 0.75rem; font-weight: 700; color: var(--text-muted); margin-bottom: 5px; text-transform: uppercase; }
    .form-control-epure {
        background-color: #f8fafc; border: 1px solid var(--border-color);
        border-radius: 10px; padding: 10px 15px; font-size: 0.9rem; width: 100%;
    }
    .form-control-epure:focus { border-color: var(--indigo-main); outline: none; background: #fff; }

    /* ESPACE MÉDICAMENTS */
    .med-card {
        background: #f8fafc; border: 1px solid var(--border-color);
        padding: 15px; border-radius: 12px; transition: 0.2s;
    }
    .med-card:hover { border-color: var(--indigo-main); background: #fff; }
    .med-icon {
        width: 40px; height: 40px; background: white; color: var(--indigo-main);
        border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;
    }
    .badge-pill-light { background: #eff6ff; color: #3b82f6; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; }
    .btn-add-med {
        background: transparent; color: var(--indigo-main); border: 2px dashed var(--indigo-main);
        padding: 4px 15px; border-radius: 8px; font-weight: 700; font-size: 0.8rem;
    }
    .btn-delete-med { background: transparent; border: none; color: #ef4444; font-size: 1.1rem; }

    /* BOUTONS ACTIONS */
    .btn-primary-indigo {
        background-color: var(--indigo-main); color: white; border: none;
        border-radius: 10px; font-weight: 600; padding: 12px 25px;
    }
    .btn-secondary-epure { background-color: #f1f5f9; color: #64748b; border: none; border-radius: 10px; padding: 12px 25px; }

    @media (max-width: 576px) {
        .main-consultation-card { border-radius: 0 !important; margin: -1.5rem !important; }
    }
</style>

@endsection