
 

<?php $__env->startSection('page-content'); ?>
<div class="container-fluid px-4">

    <h2 class="fw-bold mb-4">Disponibilités</h2>

<form action="<?php echo e(route('doctor.availability.store')); ?>" method="POST">
<?php echo csrf_field(); ?>

<div class="container mt-5">

    <div class="availability-card p-4">
            
                  <!-- les message alert  -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Félicitations !',
                        text: "<?php echo e(session('success')); ?>",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        background: '#ffffff',
                        iconColor: '#3085d6',
                        toast: true,
                        position: 'top-end',
                    });
                </script>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <h4 class="mb-4 fw-bold text-primary">Disponibilités du médecin</h4>

        <?php
           $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
        ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php
                // 1. On traduit le jour en anglais pour Carbon
                $traduction = [
                    'Lundi'=>'Monday','Mardi'=>'Tuesday','Mercredi'=>'Wednesday',
                    'Jeudi'=>'Thursday','Vendredi'=>'Friday','Samedi'=>'Saturday','Dimanche'=>'Sunday'
                ];

                 $nomJourEn = $traduction[$day]; // Ex: "Monday"
        
                // On cherche dans la collection si on a une dispo pour ce jour là
                $dispo = $currentAvailabilities->get($nomJourEn) ?? null;
            ?>
        <div class="day-item">

            <!-- LEFT -->
            <div class="day-left">
                <span class="day-title"><?php echo e($day); ?></span>
                <span class="day-status text-muted">Repos</span>
            </div>

            <!-- CENTER -->
            <label class="switch">
                <input type="checkbox" name="days[<?php echo e($day); ?>][active]" class="toggle-day" <?php echo e($dispo ?  'checked' : ''); ?> >
                <span class="slider"></span>
            </label>

            <!-- RIGHT -->
            <div class="time-box">
                <input type="time" name="days[<?php echo e($day); ?>][start]" value="<?php echo e($dispo->start_time ?? ''); ?>" <?php echo e($dispo ? '' : 'disabled'); ?> class="time-input" disabled>
                <span>—</span>
                <input type="time" name="days[<?php echo e($day); ?>][end]" value="<?php echo e($dispo->end_time ?? ''); ?>" <?php echo e($dispo ? '' : 'disabled'); ?> class="time-input" disabled>
            </div>

        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

        <button class="btn btn-save mt-4">Enregistrer</button>

    </div>

</div>
</form>

<style>
        .availability-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }

    .day-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px;
        border-radius: 12px;
        margin-bottom: 10px;
        transition: 0.3s;
        background: #f8fafc;
    }

    .day-item:hover {
        background: #eef4ff;
    }

    .day-left {
        width: 150px;
    }

    .day-title {
        font-weight: 600;
        display: block;
    }

    .time-box {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .time-input {
        border: none;
        padding: 6px 10px;
        border-radius: 8px;
        background: #eef2ff;
    }

    .time-input:disabled {
        opacity: 0.5;
    }

    /* Toggle moderne */
    .switch {
        position: relative;
        width: 48px;
        height: 24px;
    }

    .switch input {
        display: none;
    }

    .slider {
        position: absolute;
        background: #cbd5f5;
        border-radius: 20px;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .slider:before {
        content: "";
        position: absolute;
        width: 18px;
        height: 18px;
        background: white;
        border-radius: 50%;
        top: 3px;
        left: 4px;
        transition: 0.3s;
    }

    input:checked + .slider {
        background: #2563eb;
    }

    input:checked + .slider:before {
        transform: translateX(22px);
    }

    /* bouton */
    .btn-save {
        background: #2563eb;
        color: white;
        padding: 10px 20px;
        border-radius: 10px;
        border: none;
    }

    .btn-save:hover {
        background: #1e40af;
    }
</style>

<script>
        document.querySelectorAll('.toggle-day').forEach(toggle => {

        toggle.addEventListener('change', function() {

            let row = this.closest('.day-item');

            let inputs = row.querySelectorAll('.time-input');
            let status = row.querySelector('.day-status');

            inputs.forEach(input => {
                input.disabled = !this.checked;
            });

            status.textContent = this.checked ? "Disponible" : "Repos";

            if(this.checked){
                row.style.background = "#e0ecff";
            } else {
                row.style.background = "#f8fafc";
            }

        });

    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.patient', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/doctor/mes_disponibilités.blade.php ENDPATH**/ ?>