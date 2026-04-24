

<?php $__env->startSection('content'); ?>

    
<script>
    document.addEventListener('DOMContentLoaded', function() {

        <?php if(session("success")): ?>
        Swal.fire({
            icon: 'success',
            title: 'Succès !',
            text: "<?php echo e(session('success')); ?>",
            confirmButtonColor: '#00b894',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
            background: '#ffffff',
            customClass: {
                popup: 'rounded-4 border-0'
            }
        });
        <?php endif; ?>
        // Alerte d'Erreur
        <?php if(session("error")): ?>
        Swal.fire({
            icon: 'error',
            title: 'Oups...',
            text: "<?php echo e(session('error')); ?>",
            confirmButtonColor: '#d63031',
            background: '#ffffff',
            customClass: {
                popup: 'rounded-4 border-0'
            }
        });
        <?php endif; ?>

    });
</script>

<div class="container-fluid py-4">
    <div class="d-md-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark h4 mb-1">Gestion Utilisateurs</h2> <p class="text-muted small mb-0">Interface d'administration</p>
        </div>
       <form action="<?php echo e(route('admin.users.index')); ?>" method="GET" class="d-flex gap-2 align-items-center">
        <div class="input-group shadow-sm border-0" style="max-width: 300px;">
            <span class="input-group-text bg-white border-0"><i class="bi bi-search text-muted"></i></span>
            
            <input type="text" name="search" class="form-control border-0 ps-0" 
                placeholder="Rechercher un utilisateur..." 
                value="<?php echo e(request('search')); ?>">
        </div>
            
        <button type="submit" class="btn btn-emerald text-white px-4">
            Rechercher
        </button>

        
           <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-light rounded-circle shadow-sm ms-2" title="Effacer la recherche">
            <i class="bi bi-arrow-counterclockwise text-muted"></i>
            </a>
        
    </form>
    </div>

    <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light-emerald">
                    <tr>
                        <th class="ps-4 border-0 text-emerald small text-uppercase py-3 fw-bold">Utilisateur</th>
                        <th class="border-0 text-emerald small text-uppercase py-3 fw-bold">Rôle</th>
                        <th class="border-0 text-emerald small text-uppercase py-3 fw-bold text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-emerald text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 40px; height: 40px; font-weight: 600;">
                                    <?php echo e(strtoupper(substr($user->name, 0, 2))); ?>

                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0"><?php echo e($user->name); ?></div>
                                    <small class="text-muted"><?php echo e($user->email); ?></small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->role == 'admin'): ?>
                                <span class="badge rounded-pill bg-emerald-subtle text-emerald px-3 py-2">Administrateur</span>
                            <?php else: ?>
                                <span class="badge rounded-pill bg-light text-muted px-3 py-2"><?php echo e(ucfirst($user->role)); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>
                        <td class="text-end pe-4">
                            

                            
                                <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-light rounded-circle ms-1 shadow-sm border-0" title="Supprimer l'utilisateur">
                                        <i class="bi bi-trash text-danger"></i>
                                    </button>
                                </form>
                        </td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0 py-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div class="text-muted small">
            Affichage de <b><?php echo e($users->firstItem()); ?></b> à <b><?php echo e($users->lastItem()); ?></b> sur <b><?php echo e($users->total()); ?></b> utilisateurs
        </div>
        
        <div class="pagination-emerald">
            <?php echo e($users->appends(['search' => request('search')])->links()); ?>

        </div>
    </div>
</div>
</div>


<style>
    /* Palette de couleurs basée sur le bouton "Tableau de bord" */
    .btn-emerald, .bg-emerald {
        background-color: #10b981 !important; /* Le vert émeraude exact de l'image 7 */
        border: none;
    }
    
    .text-emerald {
        color: #10b981 !important;
    }

    .bg-emerald-subtle {
        background-color: rgba(16, 185, 129, 0.1) !important;
    }

    .bg-light-emerald {
        background-color: #f0fdf4 !important; /* Vert très clair pour l'en-tête */
    }

    .form-control:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 0.25 row rgba(16, 185, 129, 0.25);
    }

    /* Customisation de la pagination aux couleurs du Cabinet Médical */
    .pagination-emerald .pagination {
        margin-bottom: 0;
        gap: 5px;
    }

    .pagination-emerald .page-link {
        border: none;
        border-radius: 8px !important;
        color: #10b981; /* Couleur émeraude */
        padding: 8px 16px;
        transition: all 0.3s ease;
    }

    .pagination-emerald .page-item.active .page-link {
        background-color: #10b981 !important; /* Couleur active */
        color: white !important;
        box-shadow: 0 4px 10px rgba(16, 185, 129, 0.2);
    }

    .pagination-emerald .page-link:hover {
        background-color: rgba(16, 185, 129, 0.1);
        color: #059669;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/admin/users/index.blade.php ENDPATH**/ ?>