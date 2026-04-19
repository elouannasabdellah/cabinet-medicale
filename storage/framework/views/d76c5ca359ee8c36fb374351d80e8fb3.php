
 

<?php $__env->startSection('page-content'); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="d-flex justify-content-between align-items-center mb-4 px-3 py-2 bg-white border-bottom">
    <div>
        <h2 class="fw-bold mb-0" style="color: #1a202c; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            Tableau <span class="text-muted fw-light">/ mes rdvs </span>
        </h2>
       
    </div>

        <div class="d-flex align-items-center gap-3">
        <!-- <button class="btn btn-light rounded-circle position-relative border-0 shadow-sm" style="width: 40px; height: 40px; background: #f8f9fa;">
            <i class="bi bi-bell text-muted"></i>
            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle" style="margin-left: -8px; margin-top: 8px;"></span>
        </button> -->

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



<!-- RDVS -->

<div class="row py-5 g-4">


   <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <script>
            Swal.fire({
                title: 'Succès !',
                text: "<?php echo e(session('success')); ?>",
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $rendezVous; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rdv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <?php
            // Logique de couleur et d'icône dynamique selon le statut
            $statusSettings = [
                'pending'   => ['color' => '#f59f00', 'bg' => '#fff9db', 'icon' => 'bi-hourglass-split', 'text' => 'En attente'],
                'canceled'  => ['color' => '#fa5252', 'bg' => '#fff5f5', 'icon' => 'bi-x-circle', 'text' => 'Annulé'],
                'confirmed' => ['color' => '#40c057', 'bg' => '#ebfbee', 'icon' => 'bi-check2-all', 'text' => 'Confirmé'],
            ];
            $current = $statusSettings[$rdv->status] ?? $statusSettings['pending'];
        ?>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="modern-patient-card h-100 shadow-sm border-0">
                <div class="card-header-glass d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="calendar-mini-icon me-2">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                        <span class="fw-bold text-dark"><?php echo e(\Carbon\Carbon::parse($rdv->date)->format('d M Y')); ?></span>
                    </div>
                    <span class="badge-time"><?php echo e($rdv->time); ?></span>
                </div>

                <div class="card-body p-4">
                    <div class="d-flex mb-4">
                        <div class="consultation-icon-box" style="background: <?php echo e($current['color']); ?>15; color: <?php echo e($current['color']); ?>;">
                            <i class="bi bi-shield-plus"></i>
                        </div>
                        <div class="ms-3">
                            <p class="text-muted small mb-0">Motif du rendez-vous</p>
                            <h6 class="fw-bold text-dark mb-0"><?php echo e($rdv->reason); ?></h6>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($rdv->status != 'canceled'): ?>
        <div class="d-grid mt-3 mb-3 ">
            <a href="<?php echo e(route('doctor.consultation', $rdv->id)); ?>" class="btn-consult">
                <i class="bi bi-play-fill me-2"></i> Démarrer la Consultation
            </a>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <div class="status-indicator" style="color: <?php echo e($current['color']); ?>; background: <?php echo e($current['bg']); ?>;">
                            <i class="bi <?php echo e($current['icon']); ?> me-2"></i> <?php echo e($current['text']); ?>

                        </div>

                        <div class="dropdown">
                            <button class="btn-more-options" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </button>
                               
                            <!-- ul -->

                     <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg custom-dropdown-menu">
                        
                          
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($rdv->status == 'pending' || $rdv->status == 'canceled'): ?>
                            <li>
                             <form action="<?php echo e(route('rdv.status', $rdv->id)); ?>" method="POST">     
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <input type="hidden" name="status" value="confirmed">
                                <button type="submit" class="dropdown-item py-2 text-success">
                                    <i class="bi bi-check-circle me-2"></i>Confirmer
                                </button>
                            </form>
                        </li>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                      
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($rdv->status == 'canceled'): ?>
                        <li>
                            <form action="<?php echo e(route('rdv.status', $rdv->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <input type="hidden" name="status" value="pending">
                                <button type="submit" class="dropdown-item py-2 text-warning">
                                    <i class="bi bi-clock-history me-2"></i>Remettre en attente
                                </button>
                            </form>
                        </li>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                         
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($rdv->status != 'canceled'): ?>
                        <li>
                            <form action="<?php echo e(route('rdv.status', $rdv->id)); ?>" method="POST">        
                            <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <input type="hidden" name="status" value="canceled">
                                <button type="submit" class="dropdown-item py-2 text-danger">
                                    <i class="bi bi-x-lg me-2"></i>Annuler
                                </button>
                            </form>
                        </li>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </ul>
                            <!-- ul -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        <div class="col-12 text-center py-5">
            <div class="empty-state-container p-5 rounded-5 bg-white shadow-sm">
                <img src="https://illustrations.popsy.co/gray/medical-appointment.svg" alt="No data" class="mb-4" style="width: 200px;">
                <h4 class="fw-bold">Aucun rendez-vous</h4>
                <p class="text-muted">Vous n'avez pas de rendez-vous pour le moment.</p>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>




<style>
    /* CSS POUR UI/UX PATIENT MODERNE */
    .modern-patient-card {
        background: #ffffff;
        border-radius: 28px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        position: relative;
        overflow: visible !important; /* Important pour les dropdowns */
    }

    .modern-patient-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.1) !important;
    }

    .card-header-glass {
        padding: 20px 25px;
        background: rgba(248, 249, 250, 0.5);
        border-radius: 28px 28px 0 0;
        border-bottom: 1px solid #f1f3f5;
    }

    .calendar-mini-icon {
        color: #0dcaf0;
        font-size: 1.2rem;
    }

    .badge-time {
        background: #2d3748;
        color: white;
        padding: 6px 16px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.85rem;
    }

    .consultation-icon-box {
        width: 50px;
        height: 50px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .status-indicator {
        padding: 8px 16px;
        border-radius: 14px;
        font-size: 0.8rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-more-options {
        border: none;
        background: #f1f3f5;
        width: 40px;
        height: 40px;
        border-radius: 12px;
        color: #adb5bd;
        transition: 0.3s;
    }

    .btn-more-options:hover {
        background: #e9ecef;
        color: #495057;
    }

    .custom-dropdown-menu {
        border-radius: 18px;
        padding: 10px;
        min-width: 180px;
    }

    .custom-dropdown-menu .dropdown-item {
        border-radius: 10px;
        font-weight: 500;
        transition: 0.2s;
    }

    .btn-consult {
    /* background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); /* Violet/Bleu Moderne */
    /* color: white !important; */ 
    /* background: #4f46e5; */
    color:#4f46e5 !important;
    background: transparent;
    border: none;
    padding: 9px 5px;
    border-radius: 12px;
    font-weight: 700;
    text-align: center;
    text-decoration: none;
    transition: 0.3s;
}
.btn-consult:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
}
</style>

<!-- RDVS -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.patient', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/doctor/rdv.blade.php ENDPATH**/ ?>