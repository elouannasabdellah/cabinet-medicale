<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page introuvable | Cabinet Médical</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f4f7f6;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .error-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            text-align: center;
            max-width: 500px;
        }
        .error-code {
            font-size: 100px;
            font-weight: 900;
            color: #0d6efd;
            line-height: 1;
            margin-bottom: 20px;
        }
        .icon-box {
            font-size: 50px;
            color: #ffc107;
            margin-bottom: 10px;
        }
        .btn-home {
            background-color: #0d6efd;
            color: white;
            border-radius: 10px;
            padding: 12px 30px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            display: inline-block;
        }
        .btn-home:hover {
            background-color: #0a58ca;
            color: white;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <div class="error-card">
        <div class="icon-box">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <div class="error-code">404</div>
        <h2 class="fw-bold mb-3">Oups ! Page introuvable</h2>
        <p class="text-muted mb-4">
            Désolé, il semble que vous vous soyez égaré. La page que vous recherchez n'existe pas ou a été déplacée.
        </p>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->role == 'doctor'): ?>
                <a href="<?php echo e(route('doctor.dashboard')); ?>" class="btn-home">
                    <i class="bi bi-speedometer2 me-2"></i>Retour au Cabinet
                </a>
            <?php else: ?>
                <a href="<?php echo e(url('/dashboard')); ?>" class="btn-home">
                    <i class="bi bi-person me-2"></i>Mon Espace Patient
                </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php else: ?>
            <a href="<?php echo e(url('/')); ?>" class="btn-home">
                Retour à l'accueil
            </a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

</body>
</html><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/error/404.blade.php ENDPATH**/ ?>