

<?php $__env->startSection('page-content'); ?>

<nav class="navbar navbar-light bg-white border-bottom py-2 sticky-top" >
    <div class="container-fluid px-4">
        
        <div class="d-flex align-items-center">
            <h5 class="fw-bold mb-0 text-dark">Historique</h5>
        </div>

        <div class="d-flex align-items-center gap-2">
            
            <!-- <div class="position-relative p-2 rounded-circle bg-light d-flex align-items-center justify-content-center" 
                 style="width: 38px; height: 38px; cursor: pointer;">
                <i class="fas fa-bell text-secondary" style="font-size: 0.9rem;"></i>
                <span class="position-absolute top-1 start-100 translate-middle p-1 bg-danger border border-white rounded-circle"></span>
            </div> -->
            <div class="dropdown">
            <button class="btn btn-light rounded-circle position-relative border-0 shadow-sm d-flex align-items-center justify-content-center" 
                    id="notifMenu" data-bs-toggle="dropdown" aria-expanded="false"
                    style="width: 40px; height: 40px; background: #f8faff;">
                <i class="bi bi-bell-fill text-muted"></i>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->unreadNotifications->count() > 0): ?>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-white" 
                          style="font-size: 0.65rem; margin-left: -5px; margin-top: 5px;">
                        <?php echo e(auth()->user()->unreadNotifications->count()); ?>

                    </span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-3 py-0 overflow-hidden" 
                aria-labelledby="notifMenu" style="width: 320px; border-radius: 15px;">
                <li class="p-3 border-bottom bg-light">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="fw-bold mb-0">Notifications</h6>
                        <span class="badge bg-primary-soft text-primary small"><?php echo e(auth()->user()->unreadNotifications->count()); ?> Nouvelles</span>
                    </div>
                </li>
                <div style="max-height: 300px; overflow-y: auto;">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = auth()->user()->notifications->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                       <li>
                        <a class="dropdown-item py-3 border-bottom d-flex align-items-start gap-3 <?php echo e($notification->read_at ? 'opacity-75' : 'bg-light-blue'); ?>" href="#">
                             <?php 
                                  $status = $notification->data['status'] ?? 'confirmed'; 
                             ?>

                        <div class="icon-circle <?php echo e($status == 'cancelled' ? 'bg-danger' : 'bg-success'); ?> text-white rounded-circle d-flex align-items-center justify-content-center" 
                            style="width: 35px; height: 35px; flex-shrink: 0;">
                            
                            <i class="bi <?php echo e($status == 'cancelled' ? 'bi-x-circle' : 'bi-check2-circle'); ?>"></i>
                        </div>

                        <div>
                            <p class="small mb-1 text-wrap" style="line-height: 1.4;">
                                <?php echo e($notification->data['message']); ?>

                            </p>
                            <small class="text-muted">
                                <?php echo e($notification->created_at->diffForHumans()); ?>

                            </small>
                        </div>
                        </a>
                    </li>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <li class="p-4 text-center text-muted small">Aucune notification pour le moment</li>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->unreadNotifications->count() > 0): ?>
                    <li><a class="dropdown-item text-center py-2 small text-primary fw-bold" href="<?php echo e(route('notifications.readAll')); ?>">Tout marquer comme lu</a></li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>

            <!-- <div class="vr mx-1 opacity-25" style="height: 25px;"></div> -->

            <div class="dropdown">
                <div class="d-flex align-items-center gap-1 cursor-pointer" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="text-end d-none d-md-block">
                         <!-- <p class="mb-0 fw-bold text-dark small text-capitalize" style="line-height: 1;">
                             <?php echo e(Auth::user()->name); ?>

                        </p>  -->
                        <!-- <small class="text-muted" style="font-size: 0.65rem;">Patient</small> -->
                    </div>
                    <div class="rounded-circle border border-2 border-primary overflow-hidden" style="width: 38px; height: 38px;">
                        <img src="https://ui-avatars.com/api/?name=<?php echo e(Auth::user()->name); ?>&background=0D6EFD&color=fff" 
                             class="w-100 h-100 object-fit-cover">
                    </div>
                </div>
                
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2">
                    <li><a class="dropdown-item py-2" href="#"><i class="fas fa-user-circle me-2 text-primary"></i>Profil</a></li>
                    <li><a class="dropdown-item py-2" href="#"><i class="fas fa-cog me-2 text-primary"></i>Paramètres</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="dropdown-item py-2 text-danger">
                                <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>

<style>
    :root {
        --medical-blue: #0d6efd;
        --medical-yellow: #ffc107;
    }

    .page-header {
        border-left: 5px solid var(--medical-yellow);
        padding-left: 1.5rem;
        margin-bottom: 2rem;
    }

    .table-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .custom-table thead {
        background-color: var(--medical-blue);
        color: white;
    }

    .custom-table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        padding: 1.2rem;
        border: none;
    }

    .custom-table tbody tr:hover {
        background-color: rgba(13, 110, 253, 0.02);
    }

    .observation-text {
        font-style: italic;
        color: #6c757d;
        font-size: 0.85rem;
    }

    .diagnostic-badge {
        background-color: rgba(255, 193, 7, 0.1);
        color: #856404;
        border: 1px solid rgba(255, 193, 7, 0.2);
        padding: 4px 10px;
        border-radius: 6px;
        font-weight: 600;
        display: inline-block;
    }
 </style>

<div class="container py-5">
    <div class="page-header">
        <h2 class="fw-bold text-dark mb-1">Historique <span style="color: var(--medical-blue);">Médical</span></h2>
        <p class="text-muted mb-0 small">Consultez vos diagnostics et observations passées.</p>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($consultations->isEmpty()): ?>
        <div class="table-container p-5 text-center">
            <i class="bi bi-folder2-open text-warning opacity-50" style="font-size: 3rem;"></i>
            <h5 class="mt-3">Aucun historique disponible</h5>
        </div>
    <?php else: ?>
        <div class="table-container">
            <div class="table-responsive">
                <table class="table custom-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Médecin</th>
                            <th>Diagnostic</th>
                            <th>Observations</th>
                            <th>Constantes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $consultations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <tr>
                            <td>
                                <div class="fw-bold text-dark"><?php echo e($c->created_at->format('d/m/Y')); ?></div>
                                <div class="text-muted x-small"><?php echo e($c->created_at->format('H:i')); ?></div>
                            </td>
                            <td>
                                <div class="fw-semibold">Dr. <?php echo e($c->doctor->user->name ?? 'Alaoui'); ?></div>
                            </td>
                            <td>
                                <div class="diagnostic-badge small">
                                    <?php echo e($c->diagnostic ?? 'Non spécifié'); ?>

                                </div>
                            </td>
                            <td>
                                <div class="observation-text">
                                    <i class="bi bi-chat-left-text me-1"></i>
                                    <?php echo e($c->observations ?? 'Aucune observation particulière.'); ?>

                                </div>
                            </td>
                            <td>
                                <div class="x-small">
                                    <span class="badge bg-light text-dark border">
                                        <i class="bi bi-thermometer-half text-danger"></i> <?php echo e($c->temperature ?? '--'); ?>°C
                                    </span>
                                    <span class="badge bg-light text-dark border">
                                        <i class="bi bi-droplet text-primary"></i> <?php echo e($c->tension ?? '--'); ?>

                                    </span>
                                </div>
                            </td>
                        </tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.patient', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/patient/historique.blade.php ENDPATH**/ ?>