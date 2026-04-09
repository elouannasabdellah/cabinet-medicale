<?php

use Livewire\Volt\Component;

use App\Models\Availability;
use App\Models\Doctor;
use App\Models\Appointment;

?>

<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-5 px-4">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['Médecin', 'Date & Heure', 'Informations', 'Confirmation']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="text-center">
                <div class="rounded-circle <?php echo e($currentStep >= ($index + 1) ? 'bg-primary text-white' : 'bg-light text-muted'); ?> d-flex align-items-center justify-content-center mx-auto mb-2" style="width:40px; height:40px;">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep > ($index + 1)): ?> ✓ <?php else: ?> <?php echo e($index + 1); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <small class="<?php echo e($currentStep == ($index + 1) ? 'fw-bold text-primary' : ''); ?>"><?php echo e($label); ?></small>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index < 3): ?>
                <div class="flex-fill border-top mb-4 <?php echo e($currentStep >= ($index + 2) ? 'border-primary' : ''); ?>"></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep == 1): ?>
        <h5 class="mb-4">Choisir un médecin</h5>
        <div class="row">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="col-md-3 mb-3">
                    <div wire:click="selectDoctor(<?php echo e($doc->id); ?>, '<?php echo e($doc->name); ?>')" 
                         class="card text-center p-3 shadow-sm" 
                         style="cursor:pointer; border: <?php echo e($selectedDoctorId == $doc->id ? '2px solid #0d6efd' : '1px solid #dee2e6'); ?>;">
                        <div class="rounded-circle <?php echo e($doc->color ?? 'bg-primary'); ?> text-white mx-auto mb-2" style="width:50px;height:50px;line-height:50px;">
                            <?php echo e(substr($doc->name, 0, 1)); ?>

                        </div>
                        <strong>Dr. <?php echo e($doc->name); ?></strong><br>
                        <small class="text-muted"><?php echo e($doc->specialty); ?></small>
                    </div>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep == 2): ?>
        <h5 class="mb-4">Disponibilités de Dr. <?php echo e($selectedDoctorName); ?></h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label font-weight-bold">1. Choisir une date :</label>
                <div class="list-group">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $availableDates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <button wire:click="selectDate('<?php echo e($date['full']); ?>')" 
                                class="list-group-item list-group-item-action <?php echo e($selectedDate == $date ? 'active' : ''); ?>">
                            <?php echo e(\Carbon\Carbon::parse($date['full'])->format('d/m/Y')); ?>

                        </button>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <p class="text-danger">Aucune date disponible pour ce médecin.</p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedDate): ?>
            <div class="col-md-6">
                <label class="form-label font-weight-bold">2. Choisir une heure :</label>
                <div class="d-flex flex-wrap gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $availableTimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <button wire:click="$set('selectedTime', '<?php echo e($time); ?>')" 
                                class="btn <?php echo e($selectedTime == $time ? 'btn-primary' : 'btn-outline-primary'); ?> px-3">
                            <?php echo e($time); ?>

                        </button>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep == 3): ?>
        <h5 class="mb-4">Vos Informations</h5>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showError): ?>
                <div class="alert alert-danger py-3 small">
                    Veuillez remplir vos Information pour continuer.
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nom complet :</label>
                <input type="text" wire:model="nom" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Téléphone :</label>
                <input type="text" wire:model="telephone" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">Motif :</label>
                <textarea wire:model="motif" class="form-control" rows="3"></textarea>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep == 4): ?>
        <h5 class="mb-4">Récapitulatif</h5>
        <div class="alert alert-info border p-4">
            <p><strong>Médecin :</strong> Dr. <?php echo e($selectedDoctorName); ?></p>
            <p><strong>Date :</strong> <?php echo e($selectedDate); ?> à <?php echo e($selectedTime); ?></p>
            <p><strong>Patient :</strong> <?php echo e($nom); ?> (<?php echo e($telephone); ?>)</p>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="d-flex justify-content-between mt-5 pt-3 border-top">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep > 1): ?>
            <button wire:click="previousStep" class="btn btn-outline-secondary px-4">← Retour</button>
        <?php else: ?>
            <div></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep < 4): ?>
            <button wire:click="nextStep" class="btn btn-primary px-4" 
                <?php echo e(($currentStep == 1 && !$selectedDoctorId) || ($currentStep == 2 && (!$selectedDate || !$selectedTime))
                ? 'disabled' : ''); ?>>
                Suivant →
            </button>
        <?php else: ?>
            <button wire:click="confirmer" class="btn btn-success px-4">Confirmer le RDV ✓</button>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views\livewire/rdv-wizard.blade.php ENDPATH**/ ?>