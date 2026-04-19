<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SANTÉPRO | Votre Cabinet Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <style>
        /* Style pour les cercles d'étapes */
.step-number {
    min-width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

/* Amélioration de la section Hero pour qu'elle paraisse plus grande */
.hero-section {
    padding: 120px 0 !important; /* On augmente l'espace en haut et en bas */
}

/* Effet de zoom sur l'image de la section 4 */
.img-fluid.rounded-5:hover {
    transform: scale(1.02);
    transition: transform 0.5s ease;
}
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#">
                <span class="text-primary">SANTÉ</span><span class="text-warning">PRO</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link mx-2" href="#">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link mx-2" href="#specialites">Spécialités</a></li>
                    @auth
                        <a href="{{ route(auth()->user()->role . '.dashboard') }}" class="btn btn-primary rounded-pill px-4 ms-3">Tableau de Bord</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link mx-2">Connexion</a>
                        <a href="{{ route('register') }}" class="btn btn-warning text-white rounded-pill px-4 shadow-sm fw-bold">S'inscrire</a>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="display-3 fw-bold mb-4">La santé à portée de <span class="text-warning">main.</span></h1>
                    <p class="lead text-muted mb-5">Prenez rendez-vous en ligne, consultez vos ordonnances et suivez votre santé avec les meilleurs experts de Marrakech.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg rounded-pill px-5 shadow">Prendre RDV</a>
                        <a href="#about" class="btn btn-outline-secondary btn-lg rounded-pill px-4">En savoir plus</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0 text-center" data-aos="zoom-in" data-aos-delay="200">
                    <div class="main-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=800&q=80" alt="Cabinet Médical" class="img-fluid rounded-5 shadow-2xl">
                        <div class="floating-badge bg-white p-3 shadow-lg rounded-4" data-aos="fade-left" data-aos-delay="400">
                            <i class="fa-solid fa-bolt text-warning fs-4 mb-2"></i>
                            <p class="mb-0 fw-bold">Disponibilité</p>
                            <small class="text-success">24h/24 - 7j/7</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-primary text-white overflow-hidden">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-4" data-aos="flip-up" data-aos-delay="100">
                    <div class="p-4 border border-white border-opacity-25 rounded-4">
                        <h2 class="display-4 fw-bold text-warning">2500+</h2>
                        <p class="mb-0 text-uppercase">Patients Suivis</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="flip-up" data-aos-delay="300">
                    <div class="p-4 border border-white border-opacity-25 rounded-4">
                        <h2 class="display-4 fw-bold text-warning">15</h2>
                        <p class="mb-0 text-uppercase">Médecins Experts</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="flip-up" data-aos-delay="500">
                    <div class="p-4 border border-white border-opacity-25 rounded-4">
                        <h2 class="display-4 fw-bold text-warning">100%</h2>
                        <p class="mb-0 text-uppercase">Digitalisé</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="specialites" class="py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold fs-1">Nos <span class="text-primary">Spécialités</span></h2>
                <div class="divider-warning mx-auto"></div>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card text-center p-5 bg-white shadow-sm rounded-5">
                        <div class="icon-circle bg-blue-soft mb-4 mx-auto text-primary">
                            <i class="fa-solid fa-user-doctor fs-2"></i>
                        </div>
                        <h4 class="fw-bold">Généraliste</h4>
                        <p class="text-muted">Des consultations complètes pour toute la famille, avec un suivi rigoureux.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card text-center p-5 bg-white shadow-sm rounded-5 border-bottom-warning">
                        <div class="icon-circle bg-yellow-soft mb-4 mx-auto text-warning">
                            <i class="fa-solid fa-microscope fs-2"></i>
                        </div>
                        <h4 class="fw-bold">Laboratoire</h4>
                        <p class="text-muted">Analyses et diagnostics rapides avec des résultats accessibles sur votre espace.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card text-center p-5 bg-white shadow-sm rounded-5">
                        <div class="icon-circle bg-blue-soft mb-4 mx-auto text-primary">
                            <i class="fa-solid fa-pills fs-2"></i>
                        </div>
                        <h4 class="fw-bold">Ordonnances</h4>
                        <p class="text-muted">Récupérez vos prescriptions digitales directement après votre consultation.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=600&q=80" alt="Consultation" class="img-fluid rounded-5 shadow">
                    <div class="position-absolute bottom-0 start-0 bg-warning p-4 rounded-5 m-3 d-none d-md-block shadow-lg">
                        <h5 class="fw-bold mb-0 text-white">Simple & Rapide</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 offset-lg-1" data-aos="fade-left">
                <h2 class="fw-bold mb-4">Prendre soin de vous en <span class="text-primary">3 étapes</span></h2>
                
                <div class="d-flex mb-4">
                    <div class="step-number bg-primary text-white fw-bold me-3">1</div>
                    <div>
                        <h5 class="fw-bold">Créez votre compte</h5>
                        <p class="text-muted">Inscrivez-vous en quelques secondes pour accéder à votre espace personnel sécurisé.</p>
                    </div>
                </div>

                <div class="d-flex mb-4">
                    <div class="step-number bg-warning text-white fw-bold me-3">2</div>
                    <div>
                        <h5 class="fw-bold">Choisissez votre Docteur</h5>
                        <p class="text-muted">Sélectionnez la spécialité et le médecin qui vous convient selon vos disponibilités.</p>
                    </div>
                </div>

                <div class="d-flex mb-4">
                    <div class="step-number bg-primary text-white fw-bold me-3">3</div>
                    <div>
                        <h5 class="fw-bold">Gérez vos rendez-vous</h5>
                        <p class="text-muted">Consultez, reportez ou annulez vos rendez-vous directement depuis votre tableau de bord.</p>
                    </div>
                </div>

                <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4 py-2 mt-3">Créer mon dossier maintenant</a>
            </div>
        </div>
    </div>
</section>

    <footer class="bg-dark text-white pt-5 pb-3">
        <div class="container text-center">
            <h3 class="fw-bold mb-4 text-primary">SANTÉPRO</h3>
            <p class="text-muted mb-4">Innovons pour votre santé. Cabinet Médical Moderne à Marrakech.</p>
            <div class="d-flex justify-content-center gap-4 mb-4 fs-4 text-warning">
                <i class="fa-brands fa-facebook cursor-pointer"></i>
                <i class="fa-brands fa-instagram cursor-pointer"></i>
                <i class="fa-brands fa-linkedin cursor-pointer"></i>
            </div>
            <hr class="border-secondary">
            <p class="small text-muted mb-0">© 2026 SantéPro. Développé pour votre bien-être.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
</body>
</html>