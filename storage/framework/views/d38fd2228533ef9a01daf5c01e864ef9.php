

<?php $__env->startSection('page-content'); ?>

<h3>Mes RDV</h3>

<!-- <ul class="nav nav-tabs">
    <li class="nav-item"><a class="nav-link active">À venir</a></li>
    <li class="nav-item"><a class="nav-link">Passés</a></li>
    <li class="nav-item"><a class="nav-link">Annulés</a></li>
</ul> -->

    
  <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('mes-rendez-vous', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1978852638-0', $__key);

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.patient', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/patient/rdv-list.blade.php ENDPATH**/ ?>