

<?php $__env->startSection('page-content'); ?>


<div class="container py-4">
    <h2 class="fw-bold mb-4" style="color: #0d6efd;">Gestion des Consultations</h2>
    
    <div class="table-responsive shadow-sm rounded-4">
        <table class="table table-hover align-middle mb-0 bg-white">
            <thead style="background-color: #0d6efd; color: white;">
                <tr>
                    <th class="py-3 px-4">Date</th>
                    <th>Patient</th> 
                    <th>Diagnostic</th>
                    <th>Observations</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $consultations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <tr>
                    <td class="px-4"><?php echo e($c->created_at->format('d/m/Y H:i')); ?></td>
                    <td class="fw-bold text-primary"><?php echo e($c->patient->user->name); ?></td>
                    <td class="pt-2 py-2" ><span class="badge bg-warning text-dark"><?php echo e($c->diagnostic); ?></span></td>
                    <td class="small pt-2 py-2 "><?php echo e(Str::limit($c->observations, 50)); ?></td>
                    <td class="text-center">
                        
                    </td>
                </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.doctor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/doctor/historique.blade.php ENDPATH**/ ?>