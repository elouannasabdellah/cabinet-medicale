

<?php $__env->startSection('content'); ?>
<style>
    /* Correction pour les composants Breeze sans Tailwind */
    .max-w-xl { max-width: 36rem; }
    
    /* Force le style Bootstrap sur les inputs qui n'ont pas de classe */
    input[type="text"], input[type="email"], input[type="password"] {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        margin-top: 0.5rem;
        margin-bottom: 1rem;
    }

    input:focus {
        border-color: #86b7fe;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    /* Style des boutons enregistrer */
    button[type="submit"], .btn-primary-custom {
        background-color: #0d6efd;
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 6px;
        font-weight: 600;
        transition: 0.2s;
        margin-top: 10px;
    }

    button[type="submit"]:hover {
        background-color: #0b5ed7;
    }

    /* Style pour les titres des sections */
    header h2 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #334155;
    }

    header p {
        font-size: 0.875rem;
        color: #64748b;
        margin-bottom: 1.5rem;
    }
</style>

<div class="container py-5">
    <div class="mb-5 px-2">
        <h2 class="fw-bold text-dark display-6">Mon Profil</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>" class="text-decoration-none">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Paramètres</li>
            </ol>
        </nav>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px; border-top: 4px solid #0d6efd !important;">
                <div class="card-body p-4 p-md-5">
                    <div class="max-w-xl">
                        <?php echo $__env->make('profile.partials.update-profile-information-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px; border-top: 4px solid #6c757d !important;">
                <div class="card-body p-4 p-md-5">
                    <div class="max-w-xl">
                        <?php echo $__env->make('profile.partials.update-password-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-5" style="border-radius: 12px; border-left: 5px solid #dc3545 !important; background-color: #fff8f8;">
                <div class="card-body p-4 p-md-5">
                    <div class="max-w-xl">
                        <?php echo $__env->make('profile.partials.delete-user-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/profile/edit.blade.php ENDPATH**/ ?>