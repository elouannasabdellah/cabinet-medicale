 

<?php $__env->startSection('page-content'); ?>


<div class="d-flex justify-content-between align-items-center mb-4 px-3 py-2 bg-white border-bottom">
    <div>
        <h2 class="fw-bold mb-0" style="color: #1a202c; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            Planning <span class="text-muted fw-light">/ Calendrier</span>
        </h2>
       
    </div>

        <div class="d-flex align-items-center gap-3">
        <button class="btn btn-light rounded-circle position-relative border-0 shadow-sm" style="width: 40px; height: 40px; background: #f8f9fa;">
            <i class="bi bi-bell text-muted"></i>
            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle" style="margin-left: -8px; margin-top: 8px;"></span>
        </button>

        <div class="dropdown">
            <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" 
                 id="userMenu" data-bs-toggle="dropdown" 
                 style="width: 45px; height: 45px; cursor: pointer; font-size: 0.9rem;">
                <?php echo e(substr(Auth::user()->name, 0, 2)); ?>

            </div>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" style="border-radius: 10px;">
                <li><a class="dropdown-item fw-bold py-2" href="<?php echo e(route('profile.edit')); ?>"><i class="bi bi-person me-2"></i> Profil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="dropdown-item py-2 text-warning fw-bold"><i class="bi bi-power me-2"></i> Déconnexion</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>


</div>

<div class="container py-3">
    <!-- <div class="mb-5 text-center">
        <h1 class="fw-light text-dark" style="letter-spacing: -1px;">Mon Planning</h1>
        <div class="mx-auto" style="width: 30px; height: 2px; background: #000;"></div>
    </div> -->

    <div id='calendar' class="bg-white p-2"></div>
</div>



 <!-- Modal -->

    <!-- <div class="modal fade" id="appointmentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered shadow-lg">
        <div class="modal-content border-0" style="border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-0 pb-0" style="background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);">
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body pt-0 px-4 pb-4 text-center">
                <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white mb-3" 
                     style="width: 70px; height: 70px; border-radius: 50%; font-size: 24px; margin-top: -35px; border: 4px solid white; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                    <i class="fas fa-user"></i>
                </div>

                <h4 id="modalPatientName" class="fw-bold text-dark mb-1"></h4>
                <p id="modalReason" class="text-primary fw-medium small mb-4"></p>

                <div class="row g-3">
                    <div class="col-6">
                        <div class="p-3 bg-light" style="border-radius: 15px;">
                            <small class="text-muted d-block mb-1"><i class="fas fa-phone-alt me-1"></i> Téléphone</small>
                            <span id="modalPatientPhone" class="fw-semibold text-dark"></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 bg-light" style="border-radius: 15px;">
                            <small class="text-muted d-block mb-1"><i class="far fa-clock me-1"></i> Horaire</small>
                            <span id="modalTime" class="fw-semibold text-dark"></span>
                        </div>
                    </div>
                </div>

                <div class="mt-4 d-grid gap-2">
                    <!-- <button class="btn btn-primary py-2" style="border-radius: 12px; font-weight: 600;">
                        Consulter le dossier
                    </button> -->
                    <button class="btn btn-link text-muted text-decoration-none small" data-bs-dismiss="modal">
                        Fermer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div> -->
 <!-- Fin de modal -->


 <!-- 2 eme modal style -->
 <div class="modal fade" id="appointmentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow" style="border-radius: 12px;">
            <div class="modal-header bg-light border-bottom-0" style="border-radius: 12px 12px 0 0;">
                <h6 class="modal-title text-muted text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 1px;">
                    Détails du Rendez-vous
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary text-white d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; border-radius: 10px; font-size: 20px;">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <div class="ms-3">
                        <h5 id="modalPatientName" class="mb-0 fw-bold" style="color: #2c3e50;"></h5>
                        <span id="modalStatusBadge" class="badge rounded-pill bg-soft-success text-success" style="font-size: 0.7rem; background-color: #e1fcef;">Confirmé</span>
                    </div>
                </div>

                <hr class="text-muted opacity-10">

                <div class="row g-4">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-notes-medical text-primary me-2"></i>
                            <div>
                                <small class="text-muted d-block">Motif</small>
                                <strong id="modalReason" class="text-dark"></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-phone text-primary me-2"></i>
                            <div>
                                <small class="text-muted d-block">Contact</small>
                                <strong id="modalPatientPhone" class="text-dark"></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="far fa-calendar-alt text-primary me-2"></i>
                            <div>
                                <small class="text-muted d-block">Date</small>
                                <strong id="modalDate" class="text-dark"></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="far fa-clock text-primary me-2"></i>
                            <div>
                                <small class="text-muted d-block">Horaire</small>
                                <strong id="modalTime" class="text-dark"></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer border-top-0 p-3">
                <button type="button" class="btn btn-light fw-bold px-4" data-bs-dismiss="modal" style="border-radius: 8px;">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek', // Vue par semaine (comme ton image)
        handleWindowResize: true,
        locale: 'fr',                // Français
        firstDay: 1,                 // Semaine commence le lundi
        slotMinTime: '08:00:00',     // Début 8h
        slotMaxTime: '19:00:00',     // Fin 19h
        allDaySlot: false,
        slotDuration: '00:30:00',    // Créneaux de 30 min

        // Pour mobile : si l'écran est petit, on passe en vue "Jour"
            windowResize: function(view) {
                if (window.innerWidth < 768) {
                    calendar.changeView('timeGridDay');
                } else {
                    calendar.changeView('timeGridWeek');
                }
            },

        // Si ta table n'a pas de 'end', on définit une durée visuelle de 30 min
        defaultTimedEventDuration: '00:30:00',
        forceEventDuration: true,

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridWeek,timeGridDay'
        },


        // Récupération des données depuis ton contrôleur
        events: '/doctor/events', 

        // Style des événements (Coins arrondis comme sur l'image)
        eventDidMount: function(info) {
            info.el.style.borderRadius = '8px';
            info.el.style.padding = '5px';
            
            // Ajout du motif (reason) sous le nom
            let reasonNode = document.createElement('div');
            reasonNode.innerHTML = `<small style="opacity:0.9 italic">${info.event.extendedProps.reason}</small>`;
            info.el.querySelector('.fc-event-title').appendChild(reasonNode);
        },

        // Action au clic (affiche les infos du patient)
      eventClick: function(info) {
            // 1. Remplir les champs
            document.getElementById('modalPatientName').innerText = info.event.title;
            document.getElementById('modalReason').innerText = info.event.extendedProps.reason || 'Consultation';
            document.getElementById('modalPatientPhone').innerText = info.event.extendedProps.phone || 'Non renseigné';
            
            // Date et Heure
            let dateStr = info.event.start.toLocaleDateString('fr-FR', { day: 'numeric', month: 'long' });
            let timeStr = info.event.start.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
            
            document.getElementById('modalDate').innerText = dateStr;
            document.getElementById('modalTime').innerText = timeStr;

            // 2. Ouvrir la modale
            var myModal = new bootstrap.Modal(document.getElementById('appointmentModal'));
            myModal.show();
        }
    });

    calendar.render();
});
</script>

<style>
    /* Design proche de ton image de référence */
    
    .fc-event {
        cursor: pointer;
        transition: transform 0.2s;
    }
    .fc-event:hover {
        transform: scale(1.02);
    }
    .fc-timegrid-slot-minor {
    border-top-style: none !important;
    }
        .fc-timegrid-slot {
            height: 2.3rem !important; /* Pour avoir des cases bien larges */
        }
        .fc-toolbar-title {
            font-size: 1.2rem !important;
            font-weight: bold;
        }
        .fc-button-primary {
            background-color: #3498db !important;
            border-color: #3498db !important;
        }

        /* Empêche le calendrier de déborder de sa carte */
    #calendar {
        max-width: 100%;
        overflow-x: auto; /* Ajoute un scroll horizontal si l'écran est trop petit */
    }

    /* Améliore l'affichage des titres sur petit écran */
    .fc-header-toolbar {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center !important;
    }

    @media (max-width: 768px) {
        .fc-toolbar-title {
            font-size: 1rem !important;
        }
        .fc-button {
            padding: 0.4rem 0.6rem !important;
            font-size: 0.8rem !important;
        }
    }

        .fc-timegrid-cols table {
        min-width: 600px; /* Force une largeur minimale pour éviter l'écrasement */
    }

</style>

    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.patient', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/doctor/calendar.blade.php ENDPATH**/ ?>