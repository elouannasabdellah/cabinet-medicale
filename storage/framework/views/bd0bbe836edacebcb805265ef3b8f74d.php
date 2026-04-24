<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="d-flex sidebar-container flex-column flex-shrink-0 p-3 text-white bg-dark shadow-lg"
    style="width: 280px; height: 100vh; position: fixed; top: 0; left: 0;background-color: white; z-index: 1000; overflow-y: auto;">

    <div class="mb-4 ps-2">
        <i class="bi bi-heart-pulse-fill text-primary fs-2"></i>
        <span class="fs-4 fw-bold ms-2" style="color: #2d3748;">Cabient medicale</span>
    </div>
    <hr>

    <ul class="nav nav-pills gap-2 flex-column mb-auto">
        <li class="nav-item">
            <small class="text-uppercase text-muted fw-bold mb-2 d-block" style="font-size: 0.7rem;">Général</small>
         <a class="nav-link <?php echo e(Route::is('admin.dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('admin.dashboard')); ?>">
            <i class="bi bi-speedometer2 me-2"></i> Tableau de bord
        </a>
        </li>
        <li>
         <a class="nav-link <?php echo e(Route::is('admin.users.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.users.index')); ?>">
            <i class="bi bi-people me-2"></i> Gestion Utilisateurs
        </a>
        </li>
        <li>
          <a class="nav-link <?php echo e(Route::is('admin.doctors.create') ? 'active' : ''); ?>" href="<?php echo e(route('admin.doctors.create')); ?>">
            <i class="bi bi-person-plus me-2"></i> Ajouter un médecin
        </a>
        </li>

        
        <li>
            <a class="nav-link <?php echo e(Route::is('admin.appointments.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.appointments.index')); ?>">
            <i class="bi bi-calendar-check me-2"></i> Rendez-vous
         </a>
        </li>
    </ul>
    <hr>

    <div class="dropdown mt-auto mb-2">
        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle p-2 rounded-4"
            style="background-color: #e6fffa;"
            data-bs-toggle="dropdown" aria-expanded="false">

            <div class="d-flex align-items-center justify-content-center text-white fw-bold shadow-sm"
                style="width: 40px; height: 40px; background-color: #00b894; border-radius: 12px; min-width: 40px;">
                <?php echo e(substr(auth()->user()->name, 0, 1)); ?>

            </div>

            <div class="ms-3 overflow-hidden">
                <div class="fw-bold text-dark text-truncate" style="font-size: 0.9rem;">Admin</div>
                <div style="color: #00b894; font-size: 0.75rem;">Super Administrateur</div>
            </div>
        </a>

        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg p-2 mb-2 rounded-3">
            <li>
                <a class="dropdown-item rounded-2 py-2" href="/profile">
                    <i class="bi bi-gear me-2"></i> Paramètres
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="dropdown-item rounded-2 py-2 text-danger">
                        <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/components/admin/sidebar.blade.php ENDPATH**/ ?>