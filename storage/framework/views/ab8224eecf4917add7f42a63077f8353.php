

<?php $__env->startSection('page-content'); ?>
<div class="d-flex justify-content-between align-items-center bg-white shadow-sm border-bottom w-100" 
     style="padding: 1rem 2rem; position: sticky; top: 0; z-index: 1020;">
    
    <div>
        <h2 class="fw-bold mb-0 h4" style="color: #1a202c;">Tableau de bord</h2>
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
                <?php echo e(substr(Auth::user()->name, 0, 2)); ?>

            </div>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" style="border-radius: 10px;">
                <li><a class="dropdown-item py-2" href="<?php echo e(route('profile.edit')); ?>"><i class="bi bi-person me-2"></i> Profil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="dropdown-item py-2 text-danger fw-bold"><i class="bi bi-power me-2"></i> Déconnexion</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid px-4 mt-4">
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($prochainRDV): ?>
        <div class="alert bg-info text-white rounded-4 p-4 mb-4 d-flex justify-content-between align-items-center shadow-sm border-0">
            <div class="d-flex align-items-center">
                <div class="bg-white bg-opacity-25 rounded-circle p-3 me-3">
                    <i class="bi bi-bell-fill fs-3"></i>
                </div>
                <div>
                    <h5 class="mb-1 fw-bold">Prochain rendez-vous le <?php echo e(\Carbon\Carbon::parse($prochainRDV->date)->format('d/m/Y')); ?></h5> 
                    <p class="mb-0 opacity-75">N'oubliez pas de vous présenter 15 minutes à l'avance.</p> 
                </div>
            </div>
        </div>
    <?php else: ?>
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.patient', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/patient/dashboard.blade.php ENDPATH**/ ?>