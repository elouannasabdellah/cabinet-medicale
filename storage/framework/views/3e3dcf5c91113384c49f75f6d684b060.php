<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Patient Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
.doctor-card {
    cursor: pointer;
    border: 2px solid transparent;
    transition: 0.3s;
}

.doctor-card:hover {
    border-color: #0d6efd;
}

.doctor-card.selected {
    border: 2px solid #0d6efd;
    background-color: #f8f9fa;
}


/* pour le sidebar */
/* Titres de section (Principal, Dossier, etc.) */
.sidebar-heading {
    font-size: 0.7rem;
    text-transform: uppercase;
    font-weight: 700;
    color: #4b5563;
    letter-spacing: 1px;
}

/* Liens du menu */
.sidebar .nav-link {
    border-radius: 10px;
    font-size: 0.9rem;
    padding: 0.6rem 1rem;
    transition: all 0.2s ease;
}

.sidebar .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.05);
}

/* Le bouton Profil en bleu */
.active-profile {
    background-color: #0081a7 !important;
    color: white !important;
    border-radius: 12px !important;
}

/* Badge Orange */
.badge-orange {
    background-color: #ffb703;
    color: #0b1e2d;
    font-weight: 800;
    font-size: 0.7rem;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Pied de page utilisateur */
.user-footer {
    background-color: #162a3a;
    border-radius: 14px;
}

.avatar-circle {
    width: 38px;
    height: 38px;
    background-color: #00afb9;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 0.8rem;
}

/* Icônes */
.sidebar i {
    font-size: 1.1rem;
}
</style>
<body>

    <?php echo $__env->yieldContent('content'); ?>


    <script>
        document.querySelectorAll('.doctor-card').forEach(card => {
            card.addEventListener('click', function () {

                document.querySelectorAll('.doctor-card')
                    .forEach(c => c.classList.remove('selected'));

                this.classList.add('selected');

            });
        });
</script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- sweet alert SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Fullcalendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
</body>
</html><?php /**PATH D:\LARAVEL\TODO\todo-list\resources\views/layouts/app.blade.php ENDPATH**/ ?>