


<?php $__env->startSection('content'); ?>
<div class="d-flex">

    <!-- Sidebar -->
    <!-- <div class="bg-dark text-white p-3" style="width:250px; min-height:100vh;">
        <h4>Patient</h4>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="#" class="nav-link text-white">Dashboard</a></li>
            <li><a href="#" class="nav-link text-white">Prendre RDV</a></li>
            <li><a href="#" class="nav-link text-white">Mes RDV</a></li>
            <li><a href="#" class="nav-link text-white">Historique</a></li>
            <li><a href="#" class="nav-link text-white">Ordonnances</a></li>
            <li><a href="#" class="nav-link text-white">Profil</a></li>
        </ul>
    </div> -->

    <div class="sidebar d-flex flex-column p-3 text-white" style="width: 280px; min-height: 100vh; background-color: #0b1e2d; font-family: 'Inter', sans-serif;">
    
    <div class="mb-4 px-2">
        <h5 class="fw-bold mb-0" style="letter-spacing: -0.5px;">Cabinet Médical</h5>
        <small class="text-muted opacity-75">Espace Patient</small>
    </div>

    <div class="sidebar-heading px-2 mb-2">Principal</div>
    <ul class="nav nav-pills flex-column mb-4">
        <li class="nav-item">
            <a href="/dashboard" class="nav-link text-white d-flex align-items-center gap-3 py-2">
                <i class="bi bi-grid-fill opacity-50"></i> Tableau de bord
            </a>
        </li>
        <li class="nav-item">
            <a href="/prendre-rdv" class="nav-link text-white d-flex align-items-center justify-content-between py-2 active-hover">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-calendar-plus-fill opacity-50"></i> Prendre un RDV
                </div>
                <span class="badge-orange">+</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="/mes-rdv" class="nav-link text-white d-flex align-items-center justify-content-between py-2">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-calendar2-check-fill opacity-50"></i> Mes Rendez-vous
                </div>
                <span class="badge-orange">3</span>
            </a>
        </li>
    </ul>

    <div class="sidebar-heading px-2 mb-2">Dossier Médical</div>
    <ul class="nav nav-pills flex-column mb-4">
        <li class="nav-item">
            <a href="#" class="nav-link text-white d-flex align-items-center gap-3 py-2 opacity-75">
                <i class="bi bi-clock-history opacity-50"></i> Historique
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white d-flex align-items-center gap-3 py-2 opacity-75">
                <i class="bi bi-file-earmark-medical-fill opacity-50"></i> Ordonnances
            </a>
        </li>
    </ul>

    <div class="sidebar-heading px-2 mb-2">Compte</div>
    <ul class="nav nav-pills flex-column mt-auto">
        <li class="nav-item mb-3">
            <a href="/profil" class="nav-link active-profile d-flex align-items-center gap-3 py-2">
                <i class="bi bi-person-circle fs-5"></i> Mon Profil
            </a>
        </li>
    </ul>

    <!-- <div class="user-footer d-flex align-items-center justify-content-between p-2 mt-2">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar-circle">YB</div>
            <div class="lh-1">
                <div class="fw-bold" style="font-size: 0.85rem;">Youssef Benali</div>
                <small class="text-muted" style="font-size: 0.75rem;">Patient</small>
            </div>
        </div>
        <a href="/logout" class="text-muted ms-auto"><i class="bi bi-box-arrow-right fs-5"></i></a>
    </div> -->
</div>

    <!-- Content -->
    <div class="flex-grow-1 p-4">

        <!-- Topbar -->
        <!-- <nav class="navbar navbar-light bg-light mb-3">
            <span class="navbar-brand">Dashboard</span>
        </nav> -->

        <?php echo $__env->yieldContent('page-content'); ?>

    </div>
</div>
<!-- ✅ ICI TU AJOUTES LE MODAL -->
<div class="modal fade" id="confirmModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Voulez-vous vraiment annuler ce rendez-vous ?
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    Non
                </button>

                <button class="btn btn-danger">
                    Oui, annuler
                </button>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/layouts/patient.blade.php ENDPATH**/ ?>