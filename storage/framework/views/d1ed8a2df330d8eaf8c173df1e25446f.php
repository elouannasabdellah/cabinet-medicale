


<?php $__env->startSection('page-content'); ?>
<div class="container py-4">
    <div class="card shadow-sm border-0 p-4">
        <h4 class="mb-4"><i class="fas fa-calendar-alt text-primary"></i> Prendre un rendez-vous</h4>
        
       <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('rdv-wizard', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1482598183-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.patient', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/patient/rdv-create.blade.php ENDPATH**/ ?>