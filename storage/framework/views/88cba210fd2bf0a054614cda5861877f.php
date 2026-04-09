<div class="p-4" style="background-color: #f8fafc;">
  
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 15px;">
        <div class="card-body p-4">
            <div class="row g-2 align-items-end">
                <div class="col-md-3">
                    <label class="form-label small fw-bold text-muted">Statut</label>
                    <select wire:model.live="status" class="form-select border-light-subtle py-2">
                        <option value="">Tous les statuts</option>
                        <option value="confirmed">Confirmé</option>
                        <option value="pending">En attente</option>
                        <option value="canceled">Annulé</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-bold text-muted">Médecin</label>
                    <select wire:model.live="doctorId" class="form-select border-light-subtle py-2">
                        <option value="">Choisir un médecin</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <option value="<?php echo e($doctor->id); ?>">Dr. <?php echo e($doctor->name); ?></option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-bold text-muted">Période</label>
                    <input type="date" wire:model.live="dateFilter" class="form-control border-light-subtle py-2">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-info w-100 text-white fw-bold py-2 shadow-sm">
                        <i class="bi bi-search me-2"></i> Filtrer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div>
            <div class="d-flex gap-2 mb-4">
            <button wire:click="setTab('upcoming')" class="btn btn-white shadow-sm border py-2 px-3 <?php echo e($activeTab === 'upcoming' ? 'bg-white border-primary' : 'bg-white text-muted'); ?> " style="border-radius: 10px; background: white;">
                <i class="bi bi-calendar-event me-2"></i> À venir 
                <span class="badge bg-primary ms-2 rounded-circle"><?php echo e($counts['upcoming']); ?></span>
            </button>
            <button wire:click="setTab('past')" class="btn btn-white shadow-sm border py-2 px-3 <?php echo e($activeTab === 'past' ? 'border-secondary' : 'text-muted'); ?> text-muted" style="border-radius: 10px; background: white;">
                <i class="bi bi-clock-history me-2"></i> Passés 
                <span class="badge bg-secondary ms-2 rounded-circle"><?php echo e($counts['past']); ?></span>
            </button>
            <button wire:click="setTab('canceled')" class="btn btn-white shadow-sm border py-2 px-3 <?php echo e($activeTab === 'canceled' ? 'bg-white border-danger' : 'bg-white text-muted'); ?> text-muted" style="border-radius: 10px; background: white;">
                <i class="bi bi-x-circle me-2"></i> Annulés 
                <span class="badge bg-danger ms-2 rounded-circle"><?php echo e($counts['canceled']); ?></span>
            </button>
        </div>

    </div>
    <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="bg-light">
                    <tr class="text-muted small fw-bold">
                        <th class="ps-4 py-3">DATE & HEURE</th>
                        <th class="py-3">MÉDECIN</th>
                        <th class="py-3">MOTIF</th>
                        <th class="py-3">STATUT</th>
                        <th class="text-center py-3">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <tr <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'app-'.e($app->id).''; ?>wire:key="app-<?php echo e($app->id); ?>" style="border-bottom: 1px solid #f1f5f9;">
                        <td class="ps-4 py-3">
                            <div class="fw-bold"><?php echo e(\Carbon\Carbon::parse($app->date)->translatedFormat('D. d M. Y')); ?></div>
                            <small class="text-muted"><i class="bi bi-clock me-1"></i> <?php echo e($app->time); ?></small>
                        </td>
                        <td class="py-3">
                            <div class="fw-bold text-dark">Dr. <?php echo e($app->doctor->name); ?></div>
                            <small class="text-muted"><?php echo e($app->doctor->specialty); ?></small>
                        </td>
                        <td class="py-3 text-muted small"><?php echo e($app->reason ?? 'Consultation générale'); ?></td>
                        <td class="py-3">
                            <?php
                                $statusClass = [
                                    'confirmed' => 'bg-success-subtle text-success',
                                    'pending' => 'bg-warning-subtle text-warning',
                                    'canceled' => 'bg-danger-subtle text-danger'
                                ][$app->status] ?? 'bg-light text-muted';
                                
                                $statusLabel = [
                                    'confirmed' => 'Confirmé',
                                    'pending' => 'En attente',
                                    'canceled' => 'Annulé'
                                ][$app->status] ?? $app->status;
                            ?>
                            <span class="badge rounded-pill px-3 py-2 <?php echo e($statusClass); ?>">
                                <?php echo e($statusLabel); ?>

                            </span>
                        </td>
                        <td class="text-center py-3">
                            <button class="btn btn-sm btn-outline-info border-light-subtle me-1" style="width: 32px;"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-danger border-light-subtle" style="width: 32px;"><i class="bi bi-x-lg"></i></button>
                        </td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted small">Aucun rendez-vous trouvé.</td>
                    </tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <div class="p-3 bg-light d-flex justify-content-between align-items-center">
            <!-- <span class="small text-muted">
                Affichage de à résultats
            </span>
            <div>
              
            </div> -->
           
        </div>
           
    </div>
                 <div class="p-3 d-flex justify-content-center">
                    <?php echo e($appointments->links(data: ['showInfo' => false])); ?>

                </div>

    <style>
        /* Styles personnalisés pour correspondre à ton image */
        .active-tab { border-bottom: 2px solid #0dcafm !important; }
        .bg-success-subtle { background-color: #dcfce7 !important; }
        .text-success { color: #166534 !important; }
        .bg-warning-subtle { background-color: #fef9c3 !important; }
        .text-warning { color: #854d0e !important; }
        .bg-danger-subtle { background-color: #fee2e2 !important; }
        .text-danger { color: #991b1b !important; }
        .breadcrumb-item + .breadcrumb-item::before { content: "/"; }
    </style>
</div>


<?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/livewire/mes-rendez-vous.blade.php ENDPATH**/ ?>