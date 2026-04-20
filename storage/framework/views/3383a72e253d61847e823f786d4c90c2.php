

<?php $__env->startSection('content'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Tableau de bord</h2>
            <p class="text-muted">Bienvenue sur votre interface de gestion MediCare.</p>
        </div>

        <div class="dropdown">
            <button class="btn border-0 d-flex align-items-center p-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center shadow-sm"
                    style="width: 45px; height: 45px; border: 2px solid white;">
                    <span class="text-white fw-bold" style="font-size: 0.9rem;">
                        <?php echo e(strtoupper(substr(auth()->user()->name, 0, 1) . substr(strrchr(auth()->user()->name, " "), 1, 1))); ?>

                    </span>
                </div>
            </button>
            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-3 p-2 mt-2" style="min-width: 200px;">
                <li class="p-2 border-bottom mb-2">
                    <h6 class="mb-0 fw-bold"><?php echo e(auth()->user()->name); ?></h6>
                    <small class="text-muted"><?php echo e(auth()->user()->email); ?></small>
                </li>
                <li><a class="dropdown-item rounded-2" href="#"><i class="bi bi-person me-2"></i>Mon Profil</a></li>
                <li><a class="dropdown-item rounded-2" href="#"><i class="bi bi-gear me-2"></i>Paramètres</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="dropdown-item rounded-2 text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i>Déconnexion
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm p-3 h-100">
                <div class="d-flex align-items-center">
                    <div class="bg-soft-success p-3 rounded-4 me-3">
                        <i class="bi bi-people-fill text-success fs-4"></i>
                    </div>
                    <div>
                        <h3 class="fw-bold mb-0"> <?php echo e($stats['medecins']); ?></h3>
                        <p class="text-muted small mb-0">Médecins actifs</p>
                        <span class="text-success small fw-medium"><i class="bi bi-arrow-up-short"></i> +2</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm p-3 h-100">
                <div class="d-flex align-items-center">
                    <div class="bg-soft-primary p-3 rounded-4 me-3">
                        <i class="bi bi-person-heart text-primary fs-4"></i>
                    </div>
                    <div>
                        <h3 class="fw-bold mb-0"> <?php echo e($stats['patients']); ?></h3>
                        <p class="text-muted small mb-0">Patients inscrits</p>
                        <!-- <span class="text-primary small fw-medium"><i class="bi bi-arrow-up-short"></i> +43 ce mois</span> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm p-3 h-100">
                <div class="d-flex align-items-center">
                    <div class="bg-soft-warning p-3 rounded-4 me-3">
                        <i class="bi bi-calendar3 text-warning fs-4"></i>
                    </div>
                    <div>
                        <h3 class="fw-bold mb-0"><?php echo e($stats['rdv_aujourdhui']); ?></h3>
                        <p class="text-muted small mb-0">RDV aujourd'hui</p>
                        <span class="text-warning small fw-medium"><i class="bi bi-clock-history"></i> En cours</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm p-3 h-100">
                <div class="d-flex align-items-center">
                    <div class="bg-soft-indigo p-3 rounded-4 me-3">
                        <i class="bi bi-file-earmark-medical text-indigo fs-4"></i>
                    </div>
                    <div>
                        <h3 class="fw-bold mb-0"> <?php echo e($stats['consultations']); ?></h3>
                        <p class="text-muted small mb-0">Consultations</p>
                        <span class="text-indigo small fw-medium">
                            <i class="bi bi-graph-up"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- les graphes -->
    <div class="row g-4">
        <!-- 1 graphe -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0"><i class="bi bi-bar-chart-line me-2 text-primary"></i>Activité mensuelle</h5>
                    <!-- <select class="form-select form-select-sm w-auto">
                        <option>2026</option>
                        <option>2025</option>
                    </select> -->
                </div>

                <div style="position: relative; height: 300px; width: 100%;">
                    <canvas id="activityChart"></canvas>
                </div>

                <div class="d-flex justify-content-center gap-4 mt-3 small">
                    <span><i class="bi bi-circle-fill text-primary me-1"></i> RDV</span>
                    <span><i class="bi bi-circle-fill text-info me-1"></i> Consultations</span>
                    <span><i class="bi bi-circle-fill text-warning me-1"></i> Patients</span>
                </div>
            </div>
        </div>
        <!-- 2 eme graphe -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 h-100">
                <h5 class="fw-bold mb-4">
                    <i class="bi bi-pie-chart text-primary me-2"></i>Spécialités
                </h5>

                <div style="position: relative; height: 220px;">
                    <canvas id="specialtyChart"></canvas>
                </div>

                <div class="mt-4">
                    <?php
                    $colors = ['#0d6efd', '#ffc107', '#00b894', '#fd7e14', '#6610f2'];
                    ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $specialtyLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle me-2"
                                style="width: 12px; height: 12px; background-color: <?php echo e($colors[$index % count($colors)]); ?>;">
                            </div>
                            <span class="text-muted small"><?php echo e($label); ?></span>
                        </div>
                        <span class="fw-bold small"><?php echo e($specialtyData[$index]); ?></span>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('activityChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
            datasets: [{
                    label: 'RDV',
                    data: <?php echo json_encode($chartRdv, 15, 512) ?>,
                    backgroundColor: '#0d6efd', // Bleu primaire
                    borderRadius: 5,
                    barThickness: 15,
                },
                {
                    label: 'Consultations',
                    data: <?php echo json_encode($chartCons, 15, 512) ?>,
                    backgroundColor: '#0dcaf0', // Bleu info
                    borderRadius: 5,
                    barThickness: 15,
                },
                {
                    label: ' Patients',
                    data: <?php echo json_encode($chartPat, 15, 512) ?>,
                    backgroundColor: '#f39c12', // Orange (Ambre)
                    borderRadius: 5,
                    barThickness: 10,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                } // On utilise notre propre légende HTML
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false,
                        color: '#f0f0f0' // Lignes de guidage claires
                    },
                    ticks: {
                        color: '#a0aec0',
                        font: {
                            size: 11
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#a0aec0',
                        font: {
                            size: 11
                        }
                    }
                }
            }
        }
    });


    // Configuration du Graphe 2 (Spécialités - Doughnut)
    const ctx2 = document.getElementById('specialtyChart');
    if (ctx2) {
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($specialtyLabels, 15, 512) ?>,
                datasets: [{
                    data: <?php echo json_encode($specialtyData, 15, 512) ?>,
                    backgroundColor: ['#0d6efd', '#ffc107', '#00b894', '#fd7e14', '#6610f2'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '80%',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }
</script>


<style>
    /* Fonds pastels pour les icônes */
    .bg-soft-success {
        background-color: rgba(0, 184, 148, 0.1);
    }

    .bg-soft-primary {
        background-color: rgba(13, 110, 253, 0.1);
    }

    .bg-soft-warning {
        background-color: rgba(255, 193, 7, 0.1);
    }

    .bg-soft-danger {
        background-color: rgba(220, 53, 69, 0.1);
    }

    /* Harmonisation des textes d'icônes */
    .text-success {
        color: #00b894 !important;
    }

    .text-primary {
        color: #0d6efd !important;
    }

    .text-warning {
        color: #ffc107 !important;
    }

    .text-danger {
        color: #dc3545 !important;
    }

    /* Style de la carte */
    .card {
        transition: transform 0.2s;
        border-radius: 20px;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .bg-soft-indigo {
        background-color: rgba(102, 16, 242, 0.1);
    }

    .text-indigo {
        color: #6610f2 !important;
    }
</style>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>