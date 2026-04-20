

<?php $__env->startSection('page-content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Tableau de bord</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-info">Accueil</a></li>
                    <li class="breadcrumb-item active">Doctor</li>
                </ol>
            </nav>
        </div>
      
    </div>
   

</div>



<div class="p-4 container" style="background-color: #f8faff; min-height: 100vh;">

       

    <div class="row g-4 mb-5">

      <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 p-3 h-100">
            <div class="rounded-3 p-2 mb-3 d-flex align-items-center justify-content-center" 
                 style="background-color: #e3f2fd; width: 45px; height: 45px;">
                <i class="fas fa-calendar-check" style="color: #0077b6; font-size: 1.2rem;"></i>
            </div>
            <h2 class="fw-bold mb-0" style="color: #0077b6;"><?php echo e($stats['rdv_count']); ?></h2>
            <small class="text-muted fw-semibold">RDV à venir</small>
        </div>
    </div>
   

       
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 p-3 h-100">
            <div class="rounded-3 p-2 mb-3 d-flex align-items-center justify-content-center" 
                 style="background-color: #e8f5e9; width: 45px; height: 45px;">
                <i class="fas fa-check-circle" style="color: #2e7d32; font-size: 1.2rem;"></i>
            </div>
            <h2 class="fw-bold mb-0" style="color: #2e7d32;"><?php echo e($stats['cons_count']); ?></h2>
            <small class="text-muted fw-semibold">Consultations effectuées</small>
        </div>
    </div>


     <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 p-3 h-100">
            <div class="rounded-3 p-2 mb-3 d-flex align-items-center justify-content-center" 
                 style="background-color: #fff8e1; width: 45px; height: 45px;">
                <i class="fas fa-file-medical" style="color: #f57c00; font-size: 1.2rem;"></i>
            </div>
            <h2 class="fw-bold mb-0" style="color: #f57c00;"><?php echo e($stats['ord_count']); ?> </h2>
            <small class="text-muted fw-semibold">Ordonnances actives</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 p-3 h-100">
            <div class="rounded-3 p-2 mb-3 d-flex align-items-center justify-content-center" 
                 style="background-color: #ffebee; width: 45px; height: 45px;">
                <i class="fas fa-times-circle" style="color: #d32f2f; font-size: 1.2rem;"></i>
            </div>
            <h2 class="fw-bold mb-0" style="color: #d32f2f;"><?php echo e($stats['ann_count']); ?></h2>
            <small class="text-muted fw-semibold">Annulations</small>
        </div>
    </div>

    <div class="row g-4 mt-3 ">
        <div class="col-lg-7">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0">Prochains rendez-vous</h5>
                <a href="/doctor/rdv"><button  class="btn btn-outline-primary btn-sm rounded-pill px-3"> Voir plus</button></a>
            </div>

     
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $planningDuJour; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rdv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="card border-0 shadow-sm mb-2 p-3 rounded-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="text-center p-2 rounded-3" style="background: #eef2f7; min-width: 70px;">
                            <span class="fw-bold d-block text-primary fs-5"> 
                                <?php echo e(\Carbon\Carbon::parse($rdv->time)->format('H:i')); ?> 
                            </span>
                            <small class="text-muted text-uppercase fw-bold" style="font-size: 0.6rem;">
                                <?php echo e(\Carbon\Carbon::parse($rdv->date)->format('d/m/Y')); ?>

                            </small>
                        </div>

                        <div class="flex-grow-1">
                            <h6 class="fw-bold mb-0"> <?php echo e($rdv->patient_name ?? 'Patient Inconnu'); ?></h6>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i> <?php echo e($rdv->reason ?? 'Consultation standard'); ?>

                            </small>
                        </div>

                        <span class="badge rounded-pill px-3 py-2 bg-opacity-10 
                            <?php echo e($rdv->status == 'confirmed' ? 'bg-success text-success' : 'bg-warning text-warning'); ?>">
                            <?php echo e($rdv->status == 'confirmed' ? 'Confirmé' : 'En attente'); ?>

                        </span>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="text-center p-5 bg-white rounded-4 shadow-sm">
                    <img src="<?php echo e(asset('images/empty-calendar.png')); ?>" alt="" style="width: 50px;" class="opacity-25 mb-3">
                    <p class="text-muted mb-0">Aucun rendez-vous prévu pour le moment.</p>
                </div>
             <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> 

            <div class="card border-0 shadow-sm mt-3 p-4 rounded-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0">Flux de Rdvs hebdomadaire</h5>
                    <i class="fas fa-ellipsis-h text-muted"></i>
                </div>
                <div style="height: 250px;">
                    <canvas id="statChart"></canvas>
                </div>
            </div>
         </div>

        <div class="col-lg-5">
            <h5 class="fw-bold mb-4">Activité récente</h5>
            <div class="ps-3 border-start border-2 border-light position-relative ms-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $recentActivity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="card border-0 shadow-sm p-3 mb-4 rounded-4 position-relative">
                        <div class="position-absolute rounded-circle <?php echo e($activity->prescriptions->count() > 0 ? 'bg-info' : 'bg-success'); ?>" 
                            style="width: 12px; height: 12px; left: -26px; top: 20px; border: 2px solid #f8faff;"></div>
                        
                        <h6 class="fw-bold mb-1">
                            <?php echo e($activity->prescriptions->count() > 0 ? 'Ordonnance délivrée' : 'Consultation terminée'); ?>

                        </h6>
                        
                        <small class="text-muted d-block mb-2">
                            <?php echo e($activity->created_at->translatedFormat('d M Y')); ?> • <?php echo e($activity->created_at->diffForHumans()); ?>

                        </small>

                        <p class="small mb-0">
                            <span class="text-primary fw-bold">Diagnostic :</span> <?php echo e(Str::limit($activity->diagnostic, 50)); ?> <br>
                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activity->prescriptions->count() > 0): ?>
                                <span class="text-muted small">
                                    <i class="fas fa-pills"></i> 
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $activity->prescriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $presc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <?php echo e($presc->medicament_nom); ?><?php echo e(!$loop->last ? ', ' : ''); ?>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </p>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <p class="text-muted small">Aucune activité récente.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

    </div>
</div>



    
</div>


<script>
    const ctx = document.getElementById('statChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
          labels: <?php echo json_encode($days); ?>,

            datasets: [{
                label: 'rdvs',
                
                data: <?php echo json_encode($counts); ?>,
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.05)',
                fill: true,
                tension: 0.4,
                borderWidth: 3,
                pointRadius: 4,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#0d6efd'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { display: false },
                x: { grid: { display: false } }
            }
        }
    });

</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    body { background-color: #f8f9fa; }
    .card { transition: transform 0.2s; }
    .card:hover { transform: translateY(-5px); }
    .rounded-4 { border-radius: 1rem !important; }
    .bg-info { background-color: #17a2b8 !important; }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.patient', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/doctor/dashboard.blade.php ENDPATH**/ ?>