

<?php $__env->startSection('content'); ?>


    
<script>
    document.addEventListener('DOMContentLoaded', function() {

        <?php if(session("success")): ?>
        Swal.fire({
            icon: 'success',
            title: 'Succès !',
            text: "<?php echo e(session('success')); ?>",
            confirmButtonColor: '#00b894',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
            background: '#ffffff',
            customClass: {
                popup: 'rounded-4 border-0'
            }
        });
        <?php endif; ?>
        

    });
</script>


<div class="container-fluid py-4 px-4" style="background-color: #fcfdfe;">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h4 class="fw-bold text-dark mb-1">Gestion Médicale</h4>
            <div class="d-flex align-items-center gap-2">
                <span class="text-muted small">Dashboard</span>
                <i class="bi bi-chevron-right text-muted" style="font-size: 0.7rem;"></i>
                <span class="small fw-medium" style="color: #00b894;">Nouveau Admin/Doctor</span>
            </div>
        </div>
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-link text-decoration-none text-muted small p-0">
            <i class="bi bi-arrow-left me-1"></i> Retour
        </a>
    </div>

    <div class="row justify-content-center glass-card">
        <div class="col-lg-10">
            <div class="bg-white rounded-4 border border-light-subtle pt-1">
                <div style="height: 4px; background: linear-gradient(90deg, #00b894, #00d2ad); border-radius: 4px 4px 0 0;"></div>

                <div class="p-5">
                    <div class="mb-5">
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="p-2 rounded-3" style="background-color: rgba(0, 184, 148, 0.08);">
                                <i class="bi bi-person-plus text-primary-custom fs-5"></i>
                            </div>
                            <h5 class="fw-bold m-0">Création de compte Medecin/Admin</h5>
                        </div>
                        <p class="text-muted small ps-5">Veuillez renseigner les informations professionnelles pour l'accès au portail.</p>
                    </div>

                    <form action="<?php echo e(route('admin.doctors.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row g-4">
                            <!-- <div class="col-12 mb-2">
                                <div class="d-inline-block px-3 py-1 rounded-pill mb-3" style="background-color: #f8f9fa; border: 1px solid #eee;">
                                    <span class="fw-bold small" style="color: #00b894;">01</span>
                                    <span class="text-dark medium fw-medium ms-2">Identifiants de connexion</span>
                                </div>
                            </div> -->

                            <div class="col-md-6">
                                <label class="label-custom">Nom complet</label>
                                <input type="text" name="name" class="form-control-custom" placeholder="Dr. Prénom Nom" required>
                            </div>

                            <div class="col-md-6">
                                <label class="label-custom">Adresse Email</label>
                                <input type="email" name="email" class="form-control-custom" placeholder="exemple@uca.ac.ma" required>
                            </div>

                            <div class="col-12">
                                <label class="label-custom">Mot de passe temporaire</label>
                                <input type="password" name="password" class="form-control-custom" placeholder="••••••••" required>
                            </div>

                            <!-- <div class="col-12 mb-2 mt-5">
                                <div class="d-inline-block px-3 py-1 rounded-pill mb-3" style="background-color: #f8f9fa; border: 1px solid #eee;">
                                    <span class="fw-bold small" style="color: #00b894;">02</span>
                                    <span class="text-dark small fw-medium ms-2"></span>
                                </div>
                            </div> -->
                            <div class="col-md-12 mb-3">
                                <label class="label-custom">Type d'utilisateur</label>
                                <select name="role" id="roleSelect" class="form-select-custom" required>
                                    <option value="doctor" selected>Médecin (Doctor)</option>
                                    <option value="admin">Administrateur</option>
                                </select>
                            </div>

                            <div id="doctorFields" class="row g-4 mt-1">
                                <div class="col-12 mb-2">
                                    <div class="d-inline-block px-3 py-1 rounded-pill mb-3" style="background-color: #f8f9fa; border: 1px solid #eee;">
                                        <span class="fw-bold small" style="color: #00b894;">02</span>
                                        <span class="text-dark small fw-medium ms-2">Informations professionnelles</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="label-custom">Spécialisation</label>
                                    <select name="specialty" class="form-select-custom">
                                        <option value="Cardiologue">Cardiologue</option>
                                        <option value="Généraliste">Généraliste</option>
                                        <option value="Pédiatre">Pédiatre</option>
                                        <option value="Dermatologue">Dermatologie</option>
                                        <option value="Ophtalmologue">Ophtalmologie</option>
                                        <option value="Neurologue">Neurologie</option>
                                        <option value="Radiologue">Radiologie</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="label-custom">Téléphone</label>
                                    <input type="text" name="phone" class="form-control-custom" placeholder="+212 6...">
                                </div>
                            </div>


                            <div class="col-12 mt-5 pt-4 border-top">
                                <div class="d-flex justify-content-end gap-3">
                                    <button type="reset" class="btn btn-link text-decoration-none text-muted fw-medium">Annuler</button>
                                    <button type="submit" class="btn-primary-custom px-5">
                                        Confirmer l'ajout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Global Styles */
    .text-primary-custom {
        color: #00b894;
    }

    /* Inputs sans ombres */
    .form-control-custom,
    .form-select-custom {
        width: 100%;
        padding: 12px 16px;
        background-color: #fcfdfe;
        border: 1px solid #e9ecef;
        border-radius: 10px;
        font-size: 0.9rem;
        transition: all 0.2s ease;
        outline: none;
    }

    .form-control-custom:focus,
    .form-select-custom:focus {
        border-color: #00b894;
        background-color: #fff;
    }

    .label-custom {
        display: block;
        font-size: 0.8rem;
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Bouton Pro */
    .btn-primary-custom {
        background-color: #00b894;
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .btn-primary-custom:hover {
        background-color: #00a383;
        transform: translateY(-1px);
    }

    /* Suppression des bordures par défaut de Bootstrap */
    .border-light-subtle {
        border-color: #f1f3f5 !important;
    }

    .nav-link.active {
        background-color: rgba(0, 184, 148, 0.08) !important;
        /* Couleur #00b894 très légère */
        color: #00b894 !important;
        font-weight: 600;
        border-radius: 10px;
    }
</style>

<style>
    .form-control-custom,
.form-select-custom {
    width: 100%;
    padding: 12px 16px;
    background: #f9fafb;
    border: 1px solid transparent;
    border-radius: 12px;
    font-size: 0.9rem;
    transition: all 0.25s ease;
}

.form-control-custom:hover,
.form-select-custom:hover {
    background: #f1f5f9;
}

.form-control-custom:focus,
.form-select-custom:focus {
    background: #fff;
    border-color: #00b894;
    box-shadow: 0 0 0 4px rgba(0,184,148,0.1);
}
.btn-primary-custom {
    background: linear-gradient(135deg, #00b894, #00cec9);
    color: white;
    border: none;
    padding: 12px 26px;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary-custom:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0,184,148,0.25);
}
.glass-card {
    animation: fadeInUp 0.5s ease;
}


</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleSelect = document.getElementById('roleSelect');
        const doctorFields = document.getElementById('doctorFields');

        roleSelect.addEventListener('change', function() {
            if (this.value === 'admin') {
                // Cacher avec une animation fluide
                doctorFields.style.display = 'none';
                // Optionnel : vider les champs si nécessaire
            } else {
                // Afficher si c'est un docteur
                doctorFields.style.display = 'flex';
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/admin/doctors/create.blade.php ENDPATH**/ ?>