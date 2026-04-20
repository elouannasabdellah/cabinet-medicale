<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root {
            --sidebar-width: 280px;
            --main-bg-color: #f4f7f6;
            /* Couleur de fond douce vue sur l'image */
        }

        body {
            background-color: var(--main-bg-color);
            overflow-x: hidden;
        }

        /* body {
            background-color: #f8f9fa;
        } */

        /* On pousse le contenu vers la droite pour ne pas qu'il soit caché par la sidebar fixe */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 30px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        /* Couleurs personnalisées pour les badges d'icônes */
        .bg-light-primary {
            background-color: rgba(13, 110, 253, 0.1);
        }

        .bg-light-success {
            background-color: rgba(25, 135, 84, 0.1);
        }

        .bg-light-warning {
            background-color: rgba(255, 193, 7, 0.1);
        }

        .bg-light-danger {
            background-color: rgba(220, 53, 69, 0.1);
        }


        .sidebar-container {
            width: 280px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            /* Blanc pur comme demandé */
            background-color: #ffffff !important;
            z-index: 1000;
            /* Bordure très fine et claire pour séparer du contenu */
            border-right: 1px solid #f0f0f0;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
        }

        .sidebar-container .nav-link {
            color: #718096 !important;
            /* Gris doux pour les liens non-actifs */
            font-weight: 500;
            padding: 0.8rem 1rem;
            margin-bottom: 5px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            border: none;
        }

        /* Effet au survol (hover) */
        .sidebar-container .nav-link:hover {
            background-color: #f7fafc;
            color: #00b894 !important;
        }

        .sidebar-container .nav-link.active {
            background-color: #00b894 !important;
            /* Le vert MediCare */
            color: #ffffff !important;
            /* Texte blanc */
            box-shadow: 0 4px 12px rgba(0, 184, 148, 0.2);
        }


        .sidebar-container .nav-link i {
            margin-right: 12px;
            font-size: 1.2rem;
        }

        .section-header {
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 700;
            color: #a0aec0;
            letter-spacing: 0.05em;
            margin: 1.5rem 0 0.5rem 0.5rem;
        }
    </style>
</head>

<body>

    <?php if (isset($component)) { $__componentOriginalbebe114f3ccde4b38d7462a3136be045 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbebe114f3ccde4b38d7462a3136be045 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbebe114f3ccde4b38d7462a3136be045)): ?>
<?php $attributes = $__attributesOriginalbebe114f3ccde4b38d7462a3136be045; ?>
<?php unset($__attributesOriginalbebe114f3ccde4b38d7462a3136be045); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbebe114f3ccde4b38d7462a3136be045)): ?>
<?php $component = $__componentOriginalbebe114f3ccde4b38d7462a3136be045; ?>
<?php unset($__componentOriginalbebe114f3ccde4b38d7462a3136be045); ?>
<?php endif; ?>

    <main class="main-content">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/layouts/admin.blade.php ENDPATH**/ ?>