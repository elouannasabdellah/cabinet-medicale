

<?php $__env->startSection('content'); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Êtes-vous sûr ?',
        text: "Cette action est irréversible !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#10b981', // Ton vert émeraude
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimer !',
        cancelButtonText: 'Annuler',
        background: '#ffffff',
        customClass: {
            popup: 'rounded-4 border-0'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Si l'utilisateur confirme, on soumet le formulaire
            document.getElementById('delete-form-' + id).submit();
        }
    })
}
</script>


<div class="container-fluid py-4" style="background-color: #f8fafb; min-height: 100vh;">
    
    <div class="d-flex justify-content-between align-items-center mb-4 px-2">
        <h2 class="fw-bold text-dark h4 mb-0">Liste de tous les rendez-vous</h2>
        <span class="badge bg-emerald-subtle text-emerald px-3 py-2 rounded-pill border border-emerald-subtle">
            Total : <?php echo e($appointments->total()); ?> RDV
        </span>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr style="background-color: #fcfdfe;">
                        <th class="ps-4 py-3 border-bottom-0 text-emerald small fw-bold text-nowrap">DATE & HEURE</th>
                        <th class="py-3 border-bottom-0 text-emerald small fw-bold text-nowrap">PATIENT</th>
                        <th class="py-3 border-bottom-0 text-emerald small fw-bold text-center text-nowrap">MÉDECIN</th>
                        <th class="py-3 border-bottom-0 text-emerald small fw-bold text-center text-nowrap">STATUT</th>
                        <th class="py-3 border-bottom-0 text-emerald small fw-bold text-end pe-4 text-nowrap">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rdv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <tr class="border-top">
                        <td class="ps-4 py-3 text-nowrap">
                            <div class="fw-bold text-dark"><?php echo e(\Carbon\Carbon::parse($rdv->date)->format('d M Y')); ?></div>
                            <div class="text-muted small"><i class="bi bi-clock me-1"></i><?php echo e($rdv->time); ?></div>
                        </td>
                        <td class="text-capitalize text-dark fw-medium text-nowrap">
                            <?php echo e($rdv->patient_name); ?>

                        </td>
                        <td class="text-center text-nowrap">
                            <span class="doctor-badge">
                                <i class="bi bi-person-fill"></i> Dr. <?php echo e($rdv->doctor->name ?? 'N/A'); ?>

                            </span>
                        </td>
                        <td class="text-center">
                            <?php
                                $status = strtolower($rdv->status);
                                $badgeClass = $status == 'confirmed' ? 'confirmed' : ($status == 'canceled' ? 'canceled' : 'pending');
                                $label = $status == 'confirmed' ? 'Confirmé' : ($status == 'canceled' ? 'Annulé' : 'En attente');
                            ?>
                            <span class="badge-custom <?php echo e($badgeClass); ?>">
                                <?php echo e($label); ?>

                            </span>
                        </td>
                        <td class="text-end pe-4 text-nowrap">
                            <div class="d-flex justify-content-end gap-1">
                                <button class="btn-icon view" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo e($rdv->id); ?>">
                                    <i class="bi bi-eye"></i>
                                </button>
                                  <form action="<?php echo e(route('admin.appointments.destroy', $rdv->id)); ?>" method="POST" id="delete-form-<?php echo e($rdv->id); ?>" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="button" class="btn-icon delete" onclick="confirmDelete(<?php echo e($rdv->id); ?>)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="viewModal<?php echo e($rdv->id); ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow" style="border-radius: 15px;">
                                <div class="modal-header border-0 bg-light" style="border-radius: 15px 15px 0 0;">
                                    <h5 class="modal-title fw-bold text-dark"><i class="bi bi-info-circle me-2 text-emerald"></i>Fiche RDV #<?php echo e($rdv->id); ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4">
                                    <div class="text-center mb-4">
                                        <div class="doctor-badge mb-2">
                                            <i class="bi bi-person-fill"></i> Dr. <?php echo e($rdv->doctor->name ?? 'N/A'); ?>

                                        </div>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-6">
                                            <label class="small text-muted d-block mb-1 text-uppercase fw-bold" style="font-size: 0.65rem;">Patient</label>
                                            <span class="fw-bold text-dark"><?php echo e($rdv->patient_name); ?></span>
                                        </div>
                                        <div class="col-6 text-end">
                                            <label class="small text-muted d-block mb-1 text-uppercase fw-bold" style="font-size: 0.65rem;">Téléphone</label>
                                            <span class="fw-bold text-dark text-nowrap"><i class="bi bi-telephone me-1 text-emerald"></i> <?php echo e($rdv->patient_phone); ?></span>
                                        </div>
                                        
                                        <div class="col-6 border-top pt-3">
                                            <label class="small text-muted d-block mb-1 text-uppercase fw-bold" style="font-size: 0.65rem;">Date</label>
                                            <span class="fw-bold text-dark"><i class="bi bi-calendar-event me-2 text-emerald"></i><?php echo e(\Carbon\Carbon::parse($rdv->date)->format('d M Y')); ?></span>
                                        </div>
                                        <div class="col-6 text-end border-top pt-3">
                                            <label class="small text-muted d-block mb-1 text-uppercase fw-bold" style="font-size: 0.65rem;">Heure</label>
                                            <span class="fw-bold text-dark"><i class="bi bi-clock me-2 text-emerald"></i><?php echo e($rdv->time); ?></span>
                                        </div>

                                        <div class="col-12 border-top pt-3">
                                            <label class="small text-muted d-block mb-2 text-uppercase fw-bold" style="font-size: 0.65rem;">Motif de consultation</label>
                                            <div class="p-3 bg-light rounded-3 border-start border-emerald border-3 text-secondary shadow-sm">
                                                <i>" <?php echo e($rdv->reason ?? 'Aucun motif renseigné'); ?> "</i>
                                            </div>
                                        </div>

                                        <div class="col-12 text-center pt-2">
                                            <span class="badge-custom <?php echo e($badgeClass); ?>"><?php echo e($label); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-emerald w-100 rounded-3 fw-bold text-white shadow-sm" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">Aucun rendez-vous trouvé.</td>
                    </tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-white border-0 py-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <div class="text-muted small">
                    Affichage de <b><?php echo e($appointments->firstItem()); ?></b> à <b><?php echo e($appointments->lastItem()); ?></b> sur <b><?php echo e($appointments->total()); ?></b>
                </div>
                <div class="pagination-emerald">
                    <?php echo e($appointments->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* --- Couleurs --- */
    .text-emerald { color: #10b981 !important; }
    .bg-emerald-subtle { background-color: rgba(16, 185, 129, 0.1) !important; }
    .border-emerald-subtle { border-color: rgba(16, 185, 129, 0.2) !important; }
    .border-emerald { border-color: #10b981 !important; }
    .btn-emerald { background-color: #10b981; border: none; }
    .btn-emerald:hover { background-color: #059669; color: white; }

    /* --- Badge Docteur (Style Image 3) --- */
    .doctor-badge {
        background-color: #e0f7f1; color: #10b981;
        padding: 6px 14px; border-radius: 20px;
        font-size: 0.85rem; font-weight: 500;
        display: inline-flex; align-items: center; gap: 6px;
    }

    /* --- Badges Statuts --- */
    .badge-custom {
        padding: 5px 12px; border-radius: 6px;
        font-size: 0.8rem; font-weight: 600;
        display: inline-block; min-width: 95px; text-align: center;
    }
    .confirmed { background-color: #dcfce7; color: #15803d; }
    .pending { background-color: #f1f5f9; color: #475569; }
    .canceled { background-color: #fee2e2; color: #b91c1c; }

    /* --- Boutons Actions --- */
    .btn-icon {
        width: 34px; height: 34px; border-radius: 50%; border: none;
        background-color: #f8fafc; display: flex; align-items: center; justify-content: center; transition: 0.2s;
    }
    .btn-icon.view { color: #6366f1; }
    .btn-icon.delete { color: #ef4444; }
    .btn-icon:hover { background-color: #f1f5f9; transform: translateY(-2px); }

    /* --- Pagination --- */
    .pagination-emerald .pagination { margin-bottom: 0; gap: 4px; }
    .pagination-emerald .page-link {
        border: none; border-radius: 8px !important; color: #64748b; padding: 8px 14px;
    }
    .pagination-emerald .page-item.active .page-link {
        background-color: #10b981 !important; color: white !important;
        box-shadow: 0 4px 10px rgba(16, 185, 129, 0.25);
    }

    /* --- Mobile --- */
    @media (max-width: 768px) {
        .doctor-badge { padding: 4px 10px; font-size: 0.75rem; }
        .badge-custom { min-width: 85px; font-size: 0.75rem; }
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/admin/appointments/index.blade.php ENDPATH**/ ?>