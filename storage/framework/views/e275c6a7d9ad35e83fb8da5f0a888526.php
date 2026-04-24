<?php

use Livewire\Volt\Component;

use App\Models\Availability;
use App\Models\Doctor;
use App\Models\Appointment;

?>



<div class="card p-3 p-md-4 shadow-sm border-0" style="border-radius: 15px;">
    <div class="d-flex justify-content-between align-items-center mb-4 mb-md-5 px-1 px-md-4">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['Médecin', 'Date', 'Infos', 'Fin']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="text-center d-flex flex-column align-items-center flex-fill">
                <div class="rounded-circle <?php echo e($currentStep >= ($index + 1) ? 'bg-primary text-white shadow' : 'bg-light text-muted'); ?> d-flex align-items-center justify-content-center mb-2" 
                     style="width:35px; height:35px; min-width: 35px; font-size: 14px; transition: all 0.3s ease;">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep > ($index + 1)): ?> <i class="bi bi-check-lg"></i> <?php else: ?> <?php echo e($index + 1); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <small class="d-none d-sm-block <?php echo e($currentStep == ($index + 1) ? 'fw-bold text-primary' : 'text-muted'); ?>" style="font-size: 12px;">
                    <?php echo e($label); ?>

                </small>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index < 3): ?>
                <div class="flex-fill border-top mb-3 <?php echo e($currentStep >= ($index + 2) ? 'border-primary border-2' : ''); ?>" style="transition: all 0.5s ease;"></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep == 1): ?>
        <h5 class="mb-4 fw-bold"><i class="bi bi-person-badge me-2"></i>Choisir un médecin</h5>
        <div class="row g-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div wire:click="selectDoctor(<?php echo e($doc->id); ?>, '<?php echo e($doc->name); ?>')" 
                         class="card h-100 text-center p-3 transition-hover <?php echo e($selectedDoctorId == $doc->id ? 'border-primary bg-light-primary' : 'border-light shadow-sm'); ?>" 
                         style="cursor:pointer; border-width: 2px; border-radius: 12px;">
                        <div class="rounded-circle <?php echo e($doc->color ?? 'bg-primary'); ?> text-white mx-auto mb-3 d-flex align-items-center justify-content-center shadow" style="width:60px;height:60px; font-size: 1.5rem; font-weight: bold;">
                            <?php echo e(substr($doc->name, 0, 1)); ?>

                        </div>
                        <h6 class="mb-1 fw-bold">Dr. <?php echo e($doc->name); ?></h6>
                        <small class="text-muted"><?php echo e($doc->specialty); ?></small>
                    </div>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep == 2): ?>
        <h5 class="mb-4 fw-bold">Disponibilités : Dr. <?php echo e($selectedDoctorName); ?></h5>
        <div class="row g-4">
            <div class="col-md-5">
                <label class="form-label fw-bold text-secondary small">1. Choisir une date :</label>
                <div class="list-group list-group-flush border rounded-3 overflow-auto shadow-sm" style="max-height: 300px;">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $availableDates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <button wire:click="selectDate('<?php echo e($date['full']); ?>')" 
                                class="list-group-item list-group-item-action py-3 border-0 border-bottom <?php echo e($selectedDate == $date['full'] ? 'bg-primary text-white active' : ''); ?>">
                            <i class="bi bi-calendar3 me-2"></i> <?php echo e(\Carbon\Carbon::parse($date['full'])->translatedFormat('d F Y')); ?>

                        </button>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <div class="p-3 text-danger small">Aucune date disponible.</div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            
            <div class="col-md-7">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedDate): ?>
                    <label class="form-label fw-bold text-secondary small">2. Choisir une heure :</label>
                    <div class="row row-cols-3 row-cols-sm-4 row-cols-md-3 row-cols-lg-4 g-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $availableTimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div class="col">
                                <button wire:click="$set('selectedTime', '<?php echo e($time); ?>')" 
                                        class="btn w-100 py-2 <?php echo e($selectedTime == $time ? 'btn-primary' : 'btn-outline-primary'); ?> rounded-3 shadow-sm border-2">
                                    <?php echo e($time); ?>

                                </button>
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="h-100 d-flex align-items-center justify-content-center border rounded-3 bg-light p-4">
                        <small class="text-muted italic">Veuillez sélectionner une date à gauche</small>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep == 3): ?>
        <h5 class="mb-4 fw-bold">Vos Informations</h5>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showError): ?>
            <div class="alert alert-danger border-0 shadow-sm py-2 small mb-4">
                <i class="bi bi-exclamation-circle me-2"></i>Veuillez remplir tous les champs.
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <label class="form-label small fw-bold">Nom complet</label>
                <input type="text" wire:model="nom" class="form-control form-control-lg border-light-subtle bg-light shadow-sm fs-6" placeholder="Ex: Jean Dupont">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label small fw-bold">Téléphone</label>
                <input type="text" wire:model="telephone" class="form-control form-control-lg border-light-subtle bg-light shadow-sm fs-6" placeholder="06XXXXXXXX">
            </div>
            <div class="col-12">
                <label class="form-label small fw-bold">Motif de consultation</label>
                <textarea wire:model="motif" class="form-control border-light-subtle bg-light shadow-sm fs-6" rows="3" placeholder="Décrivez brièvement..."></textarea>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep == 4): ?>
        <h5 class="mb-4 fw-bold text-center">Récapitulatif de votre RDV</h5>
        <div class="card bg-light border-0 p-4 shadow-sm" style="border-radius: 12px;">
            <div class="d-flex align-items-center mb-3">
                <div class="bg-primary-subtle p-2 rounded-3 me-3 text-primary"><i class="bi bi-person-heart fs-4"></i></div>
                <div>
                    <div class="small text-muted">Docteur</div>
                    <div class="fw-bold">Dr. <?php echo e($selectedDoctorName); ?></div>
                </div>
            </div>
            <div class="d-flex align-items-center mb-3">
                <div class="bg-success-subtle p-2 rounded-3 me-3 text-success"><i class="bi bi-clock-history fs-4"></i></div>
                <div>
                    <div class="small text-muted">Date & Heure</div>
                    <div class="fw-bold"><?php echo e(\Carbon\Carbon::parse($selectedDate)->format('d/m/Y')); ?> à <?php echo e($selectedTime); ?></div>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div class="bg-warning-subtle p-2 rounded-3 me-3 text-warning"><i class="bi bi-person fs-4"></i></div>
                <div>
                    <div class="small text-muted">Patient</div>
                    <div class="fw-bold"><?php echo e($nom); ?> <span class="text-muted fw-normal">(<?php echo e($telephone); ?>)</span></div>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="d-flex justify-content-between mt-5 pt-3 border-top">
        <button wire:click="previousStep" class="btn btn-light px-4 py-2 fw-bold text-secondary <?php echo e($currentStep == 1 ? 'invisible' : ''); ?>">
            <i class="bi bi-arrow-left me-2"></i>Retour
        </button>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStep < 4): ?>
            <button wire:click="nextStep" class="btn btn-primary px-4 py-2 fw-bold shadow-sm" 
                <?php echo e(($currentStep == 1 && !$selectedDoctorId) || ($currentStep == 2 && (!$selectedDate || !$selectedTime)) ? 'disabled' : ''); ?>>
                Suivant<i class="bi bi-arrow-right ms-2"></i>
            </button>
        <?php else: ?>
            <button wire:click="confirmer" class="btn btn-success px-4 py-2 fw-bold shadow-sm">
                Confirmer le RDV<i class="bi bi-check2-circle ms-2"></i>
            </button>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>

<style>
    /* Effets de transition et hover */
    .transition-hover { transition: all 0.3s cubic-bezier(.25,.8,.25,1); }
    .transition-hover:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
    .bg-light-primary { background-color: rgba(13, 110, 253, 0.05); }
    .bg-primary-subtle { background-color: #e7f1ff; }
    .bg-success-subtle { background-color: #e1f7ec; }
    .bg-warning-subtle { background-color: #fff8e6; }
    .form-control:focus { box-shadow: none; border-color: #0d6efd; background-color: white !important; }
    
    @media (max-width: 576px) {
        .btn-lg { font-size: 1rem; }
    }
</style><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views\livewire/rdv-wizard.blade.php ENDPATH**/ ?>