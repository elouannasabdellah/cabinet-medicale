<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Médecin - Cabinet Médical</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .hover-opacity:hover {
            opacity: 1 !important;
            background-color: rgba(255,255,255,0.05);
            transition: all 0.3s ease;
        }
        .nav-link i { min-width: 25px; }
        /* Style pour masquer la scrollbar du sidebar si besoin */
        .sidebar::-webkit-scrollbar { width: 0px; }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar d-flex flex-column p-4 text-white" 
        style="width: 280px; height: 100vh; background-color: #0b1e2d; font-family: 'Inter', sans-serif; position: fixed; left: 0; top: 0; z-index: 1000; border-right: 1px solid rgba(255,255,255,0.05);">    
        
        <div class="mb-5 px-2">
            <h5 class="fw-bold mb-0" style="letter-spacing: -0.5px; color: #fff;">Cabinet Médical</h5>
            <small class="text-muted opacity-75">Espace Médecin</small>
        </div>

        <div class="sidebar-heading px-2 mb-3 text-uppercase" style="font-size: 0.7rem; opacity: 0.5; letter-spacing: 1px; font-weight: 600;">
            Principal
        </div>
        <ul class="nav nav-pills flex-column mb-4" style="gap: 8px; list-style: none; padding: 0;">
            <li class="nav-item">
                <a href="<?php echo e(route('doctor.dashboard')); ?>" 
                class="nav-link text-white d-flex align-items-center gap-3 py-2.5 px-3 rounded-3 <?php echo e(request()->routeIs('doctor.dashboard') ? 'bg-primary' : 'opacity-75 hover-opacity'); ?>">
                    <i class="bi bi-grid-fill fs-5"></i> 
                    <span>Tableau de bord</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?php echo e(route('doctor.rdv')); ?>" 
                class="nav-link text-white d-flex align-items-center gap-3 py-2.5 px-3 rounded-3 <?php echo e(request()->routeIs('doctor.rdv') ? 'bg-primary' : 'opacity-75 hover-opacity'); ?>">
                    <i class="bi bi-calendar-event-fill fs-5"></i> 
                    <span>Rendez-vous</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?php echo e(route('doctor.calendar')); ?>" 
                class="nav-link text-white d-flex align-items-center gap-3 py-2.5 px-3 rounded-3 <?php echo e(request()->routeIs('doctor.calendarIndex') ? 'bg-primary' : 'opacity-75 hover-opacity'); ?>">
                    <i class="bi bi-calendar3 fs-5"></i> 
                    <span>Calendrier</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-heading px-2 mb-3 mt-2 text-uppercase" style="font-size: 0.7rem; opacity: 0.5; letter-spacing: 1px; font-weight: 600;">
            Activités & Planning
        </div>
        <ul class="nav nav-pills flex-column mb-4" style="gap: 8px; list-style: none; padding: 0;">
            <li class="nav-item">
                <a href="#"  class="nav-link text-white d-flex align-items-center gap-3 py-2.5 px-3 rounded-3 <?php echo e(request()->is('doctor/consultation*') ? 'bg-primary' : 'opacity-75 hover-opacity'); ?>">
                        <i class="bi bi-file-earmark-medical-fill fs-5"></i> 
                        <span>Consultations</span>
                    </a>
                                </li>

            <li class="nav-item">
                <a href="<?php echo e(route('doctor.availability.index')); ?>" 
                class="nav-link text-white d-flex align-items-center gap-3 py-2.5 px-3 rounded-3 <?php echo e(request()->routeIs('doctor.availability.index') ? 'bg-primary' : 'opacity-75 hover-opacity'); ?>">
                    <i class="bi bi-clock-history fs-5"></i> 
                    <span>Mes Disponibilités</span>
                </a>
            </li>
              <li class="nav-item">
                <a href="<?php echo e(route('doctor.historique')); ?>" 
                class="nav-link text-white d-flex align-items-center gap-3 py-2.5 px-3 rounded-3 <?php echo e(request()->routeIs('doctor.historique') ? 'bg-primary' : 'opacity-75 hover-opacity'); ?>">
                    <i class="bi bi-clock-history fs-5"></i> 
                    <span>Historique</span>
                </a>
            </li>
        </ul>

        
        <ul class="nav nav-pills flex-column mt-auto border-top pt-4 border-secondary border-opacity-25" style="list-style: none; padding: 0; gap: 8px;">
            <li class="nav-item">
                <a href="<?php echo e(route('profile.edit')); ?>" 
                class="nav-link text-white d-flex align-items-center gap-3 py-2.5 px-3 rounded-3 <?php echo e(request()->routeIs('profile.*') ? 'bg-primary' : 'opacity-75 hover-opacity'); ?>">
                    <i class="bi bi-person-circle fs-5"></i> 
                    <span>Mon Profil</span>
                </a>
            </li>

            <li class="nav-item">
                <form method="POST" action="<?php echo e(route('logout')); ?>" id="logout-form">
                    <?php echo csrf_field(); ?>
                    <a href="<?php echo e(route('logout')); ?>" 
                    class="nav-link text-white d-flex align-items-center gap-3 py-2.5 px-3 rounded-3 opacity-75 hover-opacity"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    style="color: #ffb3b3 !important;"> 
                        <i class="bi bi-box-arrow-right fs-5"></i> 
                        <span>Déconnexion</span>
                    </a>
                </form>
            </li>
         </ul>


    </div>
</div>

    <div class="flex-grow-1" style="margin-left: 280px; min-height: 100vh; background-color: #f8fafb;">
        <div class="p-5">
            <?php echo $__env->yieldContent('page-content'); ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/layouts/doctor.blade.php ENDPATH**/ ?>