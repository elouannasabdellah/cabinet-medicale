{{-- <!DOCTYPE html>
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
</html> --}}


<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cabinet Médical Prestige — Casablanca</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,700&family=DM+Sans:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      rel="stylesheet"
    />
    <style>
      :root {
        --blue: #0a52d4;
        --blue-mid: #1a6fef;
        --blue-dark: #062a7a;
        --blue-deep: #030f2e;
        --blue-med: #1040b0;
        --blue-soft: #dce9ff;
        --gold: #e6a817;
        --gold-lt: #fdf4dc;
        --gold-dk: #b07e0d;
        --white: #ffffff;
        --off: #f4f7ff;
        --text: #060f2a;
        --muted: #4a5f82;
        --border: #d0dcf5;
        --r: 14px;
        --sh: 0 8px 40px rgba(10, 82, 212, 0.13);
        --sh-gold: 0 8px 30px rgba(230, 168, 23, 0.3);
        --sh-blue: 0 8px 40px rgba(10, 82, 212, 0.3);
      }
      *,
      *::before,
      *::after {
        box-sizing: border-box;
      }
      html {
        scroll-behavior: smooth;
      }
      body {
        font-family: "DM Sans", sans-serif;
        color: var(--text);
        background: var(--white);
        overflow-x: hidden;
      }
      h1,
      h2,
      h3,
      h4 {
        font-family: "Cormorant Garamond", serif;
        line-height: 1.12;
      }
      a {
        text-decoration: none;
      }

      /* REVEAL */
      .reveal {
        opacity: 0;
        transform: translateY(38px);
        transition:
          opacity 0.72s cubic-bezier(0.4, 0, 0.2, 1),
          transform 0.72s cubic-bezier(0.4, 0, 0.2, 1);
      }
      .reveal.fl {
        transform: translateX(-44px);
      }
      .reveal.fr {
        transform: translateX(44px);
      }
      .reveal.vis {
        opacity: 1;
        transform: none;
      }
      .d1 {
        transition-delay: 0.1s;
      }
      .d2 {
        transition-delay: 0.22s;
      }
      .d3 {
        transition-delay: 0.34s;
      }
      .d4 {
        transition-delay: 0.46s;
      }
      .d5 {
        transition-delay: 0.58s;
      }

      /* ══ NAVBAR ══ */
      .nav-wrap {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 900;
        transition:
          background 0.35s,
          box-shadow 0.35s;
        padding: 10px 0;
      }
      .nav-wrap.solid {
        background: rgba(255, 255, 255, 0.97);
        backdrop-filter: blur(16px);
        box-shadow: 0 2px 28px rgba(10, 82, 212, 0.1);
        padding: 0;
      }
      .nav-inner {
        max-width: 1180px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        padding: 0 28px;
        height: 68px;
      }
      .logo {
        display: flex;
        align-items: center;
        gap: 13px;
        margin-right: auto;
      }
      .logo-ic {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        flex-shrink: 0;
        background: linear-gradient(135deg, var(--blue-dark), var(--blue));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: var(--gold);
        box-shadow: 0 4px 18px rgba(10, 82, 212, 0.4);
        transition: transform 0.3s;
      }
      .logo:hover .logo-ic {
        transform: rotate(-8deg) scale(1.08);
      }
      .logo-txt {
        font-family: "Cormorant Garamond", serif;
        font-size: 1.22rem;
        font-weight: 700;
        color: var(--white);
        line-height: 1.1;
      }
      .nav-wrap.solid .logo-txt {
        color: var(--blue-dark);
      }
      .logo-txt span {
        display: block;
        font-size: 0.63rem;
        font-family: "DM Sans", sans-serif;
        font-weight: 400;
        color: rgba(255, 255, 255, 0.48);
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-top: 2px;
      }
      .nav-wrap.solid .logo-txt span {
        color: var(--muted);
      }
      .nav-links {
        display: flex;
        align-items: center;
        gap: 2px;
      }
      .nav-links a {
        padding: 8px 15px;
        border-radius: 8px;
        font-size: 0.86rem;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.75);
        transition:
          color 0.2s,
          background 0.2s;
      }
      .nav-wrap.solid .nav-links a {
        color: var(--muted);
      }
      .nav-links a:hover {
        color: var(--white);
        background: rgba(255, 255, 255, 0.12);
      }
      .nav-wrap.solid .nav-links a:hover {
        color: var(--blue);
        background: var(--blue-soft);
      }
      .btn-login {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--gold);
        color: var(--blue-dark) !important;
        border-radius: 10px;
        padding: 10px 22px;
        font-weight: 700 !important;
        font-size: 0.86rem !important;
        box-shadow: var(--sh-gold);
        transition:
          transform 0.22s,
          box-shadow 0.22s,
          background 0.22s !important;
        margin-left: 14px;
      }
      .btn-login:hover {
        transform: translateY(-3px);
        box-shadow: 0 16px 38px rgba(230, 168, 23, 0.5);
        background: #f4bc30 !important;
        color: var(--blue-dark) !important;
      }
      .hamburger {
        display: none;
        border: none;
        background: none;
        font-size: 1.5rem;
        color: var(--white);
        cursor: pointer;
        margin-left: 12px;
      }
      .nav-wrap.solid .hamburger {
        color: var(--blue);
      }
      .mobile-nav {
        display: none;
        flex-direction: column;
        gap: 4px;
        background: var(--white);
        padding: 14px 24px 20px;
        border-top: 1px solid var(--border);
        box-shadow: 0 8px 30px rgba(10, 82, 212, 0.08);
      }
      .mobile-nav.open {
        display: flex;
      }
      .mobile-nav a {
        padding: 10px 14px;
        border-radius: 9px;
        color: var(--muted);
        font-size: 0.9rem;
        font-weight: 500;
        transition:
          background 0.2s,
          color 0.2s;
      }
      .mobile-nav a:hover {
        background: var(--blue-soft);
        color: var(--blue);
      }
      .mobile-nav .btn-login {
        margin: 8px 0 0;
        justify-content: center;
      }

      /* ══ HERO ══ */
      .hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(
          145deg,
          var(--blue-deep) 0%,
          var(--blue-dark) 50%,
          var(--blue-med) 100%
        );
        min-height: 100vh;
        display: flex;
        align-items: center;
      }
      .hero-grid {
        position: absolute;
        inset: 0;
        pointer-events: none;
        background-image:
          linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
          linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        background-size: 64px 64px;
        mask-image: radial-gradient(
          ellipse 80% 80% at 50% 50%,
          black,
          transparent
        );
      }
      .hero-glow {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
      }
      .hg1 {
        width: 600px;
        height: 600px;
        background: radial-gradient(
          circle,
          rgba(26, 111, 239, 0.28) 0%,
          transparent 70%
        );
        left: -120px;
        top: 50%;
        transform: translateY(-50%);
        animation: hglow 9s ease-in-out infinite;
      }
      .hg2 {
        width: 400px;
        height: 400px;
        background: radial-gradient(
          circle,
          rgba(230, 168, 23, 0.14) 0%,
          transparent 70%
        );
        right: -60px;
        top: -80px;
        animation: hglow 11s ease-in-out infinite reverse;
      }
      @keyframes hglow {
        0%,
        100% {
          transform: translateY(-50%) scale(1);
        }
        50% {
          transform: translateY(-52%) scale(1.07);
        }
      }
      .ring {
        position: absolute;
        border-radius: 50%;
        border: 1px solid rgba(230, 168, 23, 0.12);
        animation: rspin linear infinite;
        pointer-events: none;
      }
      .r1 {
        width: 500px;
        height: 500px;
        right: -100px;
        top: 50%;
        margin-top: -250px;
        animation-duration: 55s;
      }
      .r2 {
        width: 720px;
        height: 720px;
        right: -200px;
        top: 50%;
        margin-top: -360px;
        animation-duration: 85s;
        border-color: rgba(255, 255, 255, 0.04);
      }
      .r3 {
        width: 220px;
        height: 220px;
        right: 130px;
        top: 50%;
        margin-top: -110px;
        animation-duration: 32s;
        border-color: rgba(230, 168, 23, 0.22);
      }
      @keyframes rspin {
        from {
          transform: rotate(0);
        }
        to {
          transform: rotate(360deg);
        }
      }
      .ptcls {
        position: absolute;
        inset: 0;
        pointer-events: none;
        overflow: hidden;
      }
      .pt {
        position: absolute;
        border-radius: 50%;
        background: var(--gold);
        opacity: 0;
        animation: ptup linear infinite;
      }
      @keyframes ptup {
        0% {
          opacity: 0;
          transform: translateY(0) scale(0);
        }
        15% {
          opacity: 0.55;
        }
        85% {
          opacity: 0.25;
        }
        100% {
          opacity: 0;
          transform: translateY(-110vh) scale(1.6);
        }
      }
      .hero-cut {
        position: absolute;
        bottom: -1px;
        left: 0;
        right: 0;
        height: 90px;
        background: var(--white);
        clip-path: polygon(100% 0, 100% 100%, 0 100%);
        pointer-events: none;
      }
      .hero-inner {
        position: relative;
        z-index: 5;
        max-width: 1180px;
        margin: 0 auto;
        padding: 0 28px;
        width: 100%;
      }

      .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        background: rgba(230, 168, 23, 0.12);
        border: 1px solid rgba(230, 168, 23, 0.28);
        border-radius: 30px;
        padding: 7px 18px;
        font-size: 0.73rem;
        font-weight: 700;
        color: var(--gold);
        letter-spacing: 1.8px;
        text-transform: uppercase;
        margin-bottom: 28px;
      }
      .eb-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--gold);
        animation: ebblink 1.6s ease infinite;
      }
      @keyframes ebblink {
        0%,
        100% {
          opacity: 1;
        }
        50% {
          opacity: 0.2;
        }
      }

      .hero-h {
        font-size: clamp(2.8rem, 6.5vw, 5.4rem);
        font-weight: 700;
        color: var(--white);
        line-height: 1.05;
        margin-bottom: 26px;
      }
      .hero-h em {
        font-style: italic;
        color: var(--gold);
      }
      .hero-h .ln {
        display: block;
      }
      .hero-sub {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.6);
        line-height: 1.78;
        max-width: 470px;
        margin-bottom: 44px;
      }
      .btn-hero {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--gold);
        color: var(--blue-dark);
        border: none;
        border-radius: 12px;
        padding: 16px 36px;
        font-weight: 700;
        font-size: 0.97rem;
        box-shadow: var(--sh-gold);
        transition:
          transform 0.24s,
          box-shadow 0.24s,
          background 0.24s;
        cursor: pointer;
      }
      .btn-hero:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 44px rgba(230, 168, 23, 0.52);
        background: #f4bc30;
        color: var(--blue-dark);
      }
      .bh-ic {
        width: 32px;
        height: 32px;
        background: rgba(6, 42, 122, 0.18);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        transition: transform 0.3s;
      }
      .btn-hero:hover .bh-ic {
        transform: rotate(15deg) scale(1.1);
      }

      .hero-stats {
        display: flex;
        gap: 0;
        flex-wrap: wrap;
        margin-top: 56px;
      }
      .hs {
        padding: 0 34px 0 0;
        border-right: 1px solid rgba(255, 255, 255, 0.1);
        margin-right: 34px;
      }
      .hs:last-child {
        border: none;
        margin: 0;
        padding: 0;
      }
      .hs-v {
        font-family: "Cormorant Garamond", serif;
        font-size: 2.6rem;
        font-weight: 700;
        color: var(--white);
        line-height: 1;
      }
      .hs-v sup {
        font-size: 1.2rem;
        color: var(--gold);
      }
      .hs-l {
        font-size: 0.73rem;
        color: rgba(255, 255, 255, 0.42);
        letter-spacing: 0.3px;
        margin-top: 5px;
      }

      /* Carte flottante */
      .hf-wrap {
        position: relative;
        display: flex;
        justify-content: center;
        padding: 24px 0 24px 16px;
      }
      .hf-card {
        background: rgba(255, 255, 255, 0.07);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 20px;
        padding: 26px;
        backdrop-filter: blur(20px);
        width: 100%;
        max-width: 340px;
        animation: hfc 6s ease-in-out infinite;
      }
      @keyframes hfc {
        0%,
        100% {
          transform: translateY(0);
        }
        50% {
          transform: translateY(-10px);
        }
      }
      .hfc-title {
        font-family: "Cormorant Garamond", serif;
        color: var(--white);
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 9px;
      }
      .hfc-title i {
        color: var(--gold);
      }
      .dpill {
        display: flex;
        align-items: center;
        gap: 11px;
        padding: 11px 13px;
        border-radius: 11px;
        background: rgba(255, 255, 255, 0.07);
        border: 1px solid rgba(255, 255, 255, 0.07);
        margin-bottom: 9px;
        transition: background 0.2s;
      }
      .dpill:hover {
        background: rgba(255, 255, 255, 0.14);
      }
      .dav {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Cormorant Garamond", serif;
        font-weight: 700;
        font-size: 0.9rem;
        color: var(--white);
      }
      .dp-n {
        font-size: 0.83rem;
        font-weight: 600;
        color: var(--white);
      }
      .dp-s {
        font-size: 0.71rem;
        color: rgba(255, 255, 255, 0.43);
      }
      .dp-b {
        margin-left: auto;
        background: rgba(230, 168, 23, 0.18);
        color: var(--gold);
        border-radius: 20px;
        padding: 3px 10px;
        font-size: 0.69rem;
        font-weight: 700;
        border: 1px solid rgba(230, 168, 23, 0.25);
      }
      .lock-hint {
        margin-top: 13px;
        padding: 11px 13px;
        background: rgba(230, 168, 23, 0.09);
        border: 1px solid rgba(230, 168, 23, 0.2);
        border-radius: 10px;
        display: flex;
        align-items: center;
        gap: 9px;
        font-size: 0.76rem;
        color: rgba(255, 255, 255, 0.6);
      }
      .lock-hint i {
        color: var(--gold);
        flex-shrink: 0;
      }

      .abadge {
        position: absolute;
        background: var(--white);
        border-radius: 12px;
        padding: 10px 16px;
        box-shadow: 0 8px 32px rgba(10, 82, 212, 0.22);
        display: flex;
        align-items: center;
        gap: 10px;
        animation: fab ease-in-out infinite;
      }
      @keyframes fab {
        0%,
        100% {
          transform: translateY(0);
        }
        50% {
          transform: translateY(-8px);
        }
      }
      .ab1 {
        top: -12px;
        left: -28px;
        animation-duration: 5s;
      }
      .ab2 {
        bottom: -12px;
        right: -18px;
        animation-duration: 6s;
        animation-delay: 2s;
      }
      .ab-ic {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.95rem;
      }
      .ab-v {
        font-family: "Cormorant Garamond", serif;
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--blue-dark);
      }
      .ab-l {
        font-size: 0.67rem;
        color: var(--muted);
      }

      /* ══ SECTION COMMUNES ══ */
      .wrap {
        max-width: 1180px;
        margin: 0 auto;
        padding: 0 28px;
      }
      .s-eye {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 0.71rem;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--gold-dk);
        margin-bottom: 12px;
      }
      .s-eye::before {
        content: "";
        width: 24px;
        height: 2px;
        background: var(--gold);
        border-radius: 2px;
      }
      .s-title {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 700;
        color: var(--blue-dark);
        margin-bottom: 14px;
      }
      .s-title em {
        font-style: italic;
        color: var(--blue-mid);
      }
      .s-desc {
        font-size: 0.95rem;
        color: var(--muted);
        line-height: 1.78;
        max-width: 500px;
      }

      /* ══ SPÉCIALITÉS ══ */
      #specialites {
        padding: 110px 0;
        background: var(--white);
        position: relative;
      }
      #specialites::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 280px;
        height: 280px;
        background: radial-gradient(
          circle at 0% 0%,
          rgba(230, 168, 23, 0.06),
          transparent 70%
        );
        pointer-events: none;
      }

      .sp-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: var(--r);
        padding: 30px 26px;
        height: 100%;
        position: relative;
        overflow: hidden;
        cursor: pointer;
        transition:
          transform 0.28s,
          box-shadow 0.28s,
          border-color 0.28s;
      }
      .sp-card::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--blue), var(--gold));
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.32s cubic-bezier(0.4, 0, 0.2, 1);
      }
      .sp-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--sh);
        border-color: transparent;
      }
      .sp-card:hover::after {
        transform: scaleX(1);
      }
      .sp-ic {
        width: 58px;
        height: 58px;
        border-radius: 14px;
        background: var(--blue-soft);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 22px;
        transition:
          background 0.28s,
          transform 0.28s;
      }
      .sp-card:hover .sp-ic {
        background: var(--blue);
        transform: scale(1.1) rotate(-5deg);
      }
      .sp-card:hover .sp-ic i {
        color: var(--gold) !important;
      }
      .sp-t {
        font-family: "Cormorant Garamond", serif;
        font-size: 1.22rem;
        font-weight: 700;
        color: var(--blue-dark);
        margin-bottom: 8px;
      }
      .sp-d {
        font-size: 0.83rem;
        color: var(--muted);
        line-height: 1.65;
      }
      .sp-l {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--blue-mid);
        margin-top: 18px;
        transition:
          gap 0.2s,
          color 0.2s;
      }
      .sp-card:hover .sp-l {
        gap: 12px;
        color: var(--blue);
      }
      .sp-card.feat {
        background: linear-gradient(
          145deg,
          var(--blue-dark) 0%,
          var(--blue) 100%
        );
        border-color: transparent;
      }
      .sp-card.feat .sp-t {
        color: var(--white);
      }
      .sp-card.feat .sp-d {
        color: rgba(255, 255, 255, 0.6);
      }
      .sp-card.feat .sp-ic {
        background: rgba(230, 168, 23, 0.15);
      }
      .sp-card.feat .sp-ic i {
        color: var(--gold) !important;
      }
      .sp-card.feat .sp-l {
        color: var(--gold);
      }
      .sp-card.feat:hover {
        box-shadow: var(--sh-blue);
      }

      /* ══ MÉDECINS ══ */
      #medecins {
        padding: 110px 0 0;
        background: var(--off);
        position: relative;
        overflow: hidden;
      }
      #medecins::before {
        content: "";
        position: absolute;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: radial-gradient(
          circle,
          rgba(10, 82, 212, 0.06),
          transparent 70%
        );
        bottom: -120px;
        right: -100px;
        pointer-events: none;
      }

      .doc-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: var(--r);
        overflow: hidden;
        height: 100%;
        transition:
          transform 0.28s,
          box-shadow 0.28s;
      }
      .doc-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--sh);
        border-color: transparent;
      }
      .dc-head {
        position: relative;
        padding: 26px 24px 18px;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: flex-start;
        gap: 14px;
      }
      .dc-head::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--blue), var(--gold));
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s;
      }
      .doc-card:hover .dc-head::before {
        transform: scaleX(1);
      }
      .dc-av {
        width: 62px;
        height: 62px;
        border-radius: 50%;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Cormorant Garamond", serif;
        font-size: 1.35rem;
        font-weight: 700;
        color: var(--white);
        position: relative;
      }
      .dc-av::after {
        content: "";
        position: absolute;
        inset: -3px;
        border-radius: 50%;
        border: 2px solid var(--gold);
        opacity: 0;
        transition: opacity 0.3s;
      }
      .doc-card:hover .dc-av::after {
        opacity: 1;
      }
      .dc-name {
        font-family: "Cormorant Garamond", serif;
        font-size: 1.12rem;
        font-weight: 700;
        color: var(--blue-dark);
      }
      .dc-spec {
        font-size: 0.76rem;
        color: var(--blue-mid);
        font-weight: 600;
        margin-top: 4px;
      }
      .dc-stars {
        display: flex;
        align-items: center;
        gap: 3px;
        margin-top: 6px;
      }
      .dc-stars i {
        font-size: 0.72rem;
        color: var(--gold);
      }
      .dc-stars span {
        font-size: 0.72rem;
        color: var(--muted);
        margin-left: 3px;
      }
      .dc-exp {
        margin-left: auto;
        background: var(--gold-lt);
        color: var(--gold-dk);
        border-radius: 20px;
        padding: 4px 10px;
        font-size: 0.7rem;
        font-weight: 700;
        align-self: flex-start;
        border: 1px solid rgba(230, 168, 23, 0.25);
      }
      .dc-body {
        padding: 20px 24px;
      }
      .dc-tag {
        display: inline-block;
        background: var(--blue-soft);
        color: var(--blue-mid);
        border-radius: 20px;
        padding: 3px 10px;
        font-size: 0.7rem;
        font-weight: 600;
        margin: 2px;
      }
      .dc-hor {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 16px;
        padding: 10px 13px;
        background: var(--gold-lt);
        border-radius: 9px;
        border: 1px solid rgba(230, 168, 23, 0.2);
        font-size: 0.79rem;
        font-weight: 600;
        color: var(--gold-dk);
      }
      .dc-lock {
        display: flex;
        align-items: center;
        gap: 9px;
        margin-top: 13px;
        padding: 11px 13px;
        background: var(--blue-soft);
        border-radius: 9px;
        border: 1px solid rgba(10, 82, 212, 0.12);
        font-size: 0.79rem;
        color: var(--blue-mid);
      }
      .dc-lock i {
        color: var(--blue);
        flex-shrink: 0;
      }
      .dc-lock a {
        color: var(--blue);
        font-weight: 700;
        text-decoration: underline;
        text-underline-offset: 2px;
      }

      /* ══ ABOUT STRIP (Image + Description) ══ */
      .about-strip {
        margin-top: 80px;
        background: linear-gradient(
          145deg,
          var(--blue-dark) 0%,
          var(--blue) 55%,
          var(--blue-mid) 100%
        );
        border-radius: 22px 22px 0 0;
        overflow: hidden;
        position: relative;
      }
      .about-strip::before {
        content: "";
        position: absolute;
        inset: 0;
        pointer-events: none;
        background: repeating-linear-gradient(
          -45deg,
          transparent,
          transparent 38px,
          rgba(255, 255, 255, 0.018) 38px,
          rgba(255, 255, 255, 0.018) 76px
        );
      }
      .about-strip::after {
        content: "";
        position: absolute;
        width: 380px;
        height: 380px;
        border-radius: 50%;
        background: radial-gradient(
          circle,
          rgba(230, 168, 23, 0.16),
          transparent 70%
        );
        top: -100px;
        right: -60px;
        pointer-events: none;
      }
      .as-bar {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 5px;
        background: linear-gradient(
          to bottom,
          var(--gold),
          rgba(230, 168, 23, 0.25)
        );
        z-index: 3;
      }

      /* Image */
      .as-img-col {
        position: relative;
        overflow: hidden;
        min-height: 480px;
      }
      .as-svg-wrap {
        width: 100%;
        height: 100%;
        position: absolute;
        inset: 0;
      }
      .as-img-tag {
        position: absolute;
        bottom: 20px;
        left: 24px;
        background: var(--gold);
        color: var(--blue-dark);
        border-radius: 9px;
        padding: 9px 16px;
        font-size: 0.79rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
        box-shadow: var(--sh-gold);
        z-index: 2;
      }

      /* Contenu texte */
      .as-content {
        padding: 56px 52px;
        position: relative;
        z-index: 2;
      }
      .as-eye {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--gold);
        margin-bottom: 16px;
      }
      .as-eye::before {
        content: "";
        width: 22px;
        height: 2px;
        background: var(--gold);
        border-radius: 2px;
      }
      .as-title {
        font-family: "Cormorant Garamond", serif;
        font-size: clamp(1.8rem, 3.5vw, 2.8rem);
        font-weight: 700;
        color: var(--white);
        line-height: 1.1;
        margin-bottom: 18px;
      }
      .as-title em {
        font-style: italic;
        color: var(--gold);
      }
      .as-desc {
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.65);
        line-height: 1.78;
        margin-bottom: 28px;
      }

      .as-feats {
        display: flex;
        flex-direction: column;
        gap: 13px;
        margin-bottom: 32px;
      }
      .asf {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        padding: 14px 16px;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        transition: background 0.2s;
      }
      .asf:hover {
        background: rgba(255, 255, 255, 0.11);
      }
      .asf-n {
        font-family: "Cormorant Garamond", serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--gold);
        opacity: 0.42;
        line-height: 1;
        flex-shrink: 0;
        width: 28px;
      }
      .asf-t {
        font-weight: 600;
        font-size: 0.88rem;
        color: var(--white);
        margin-bottom: 3px;
      }
      .asf-d {
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.5);
        line-height: 1.55;
      }

      .as-kpis {
        display: flex;
        gap: 18px;
        flex-wrap: wrap;
      }
      .as-kpi {
        text-align: center;
        padding: 14px 18px;
        background: rgba(255, 255, 255, 0.07);
        border: 1px solid rgba(255, 255, 255, 0.09);
        border-radius: 12px;
        flex: 1;
        min-width: 80px;
        transition: background 0.2s;
      }
      .as-kpi:hover {
        background: rgba(255, 255, 255, 0.13);
      }
      .as-kpi-v {
        font-family: "Cormorant Garamond", serif;
        font-size: 2rem;
        font-weight: 700;
        color: var(--gold);
        line-height: 1;
      }
      .as-kpi-l {
        font-size: 0.72rem;
        color: rgba(255, 255, 255, 0.45);
        margin-top: 5px;
        letter-spacing: 0.3px;
      }

      /* ══ FOOTER ══ */
      footer {
        background: var(--blue-deep);
        padding: 64px 0 0;
        position: relative;
      }
      footer::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(
          90deg,
          var(--blue),
          var(--gold) 50%,
          var(--blue)
        );
      }
      .f-inner {
        max-width: 1180px;
        margin: 0 auto;
        padding: 0 28px;
      }
      .f-logo {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 14px;
      }
      .f-lic {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        flex-shrink: 0;
        background: linear-gradient(135deg, var(--blue-dark), var(--blue));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: var(--gold);
      }
      .f-lt {
        font-family: "Cormorant Garamond", serif;
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--white);
      }
      .f-lt span {
        display: block;
        font-size: 0.6rem;
        font-family: "DM Sans", sans-serif;
        font-weight: 400;
        color: rgba(255, 255, 255, 0.32);
        letter-spacing: 1.8px;
        text-transform: uppercase;
        margin-top: 1px;
      }
      .f-tag {
        font-size: 0.82rem;
        color: rgba(255, 255, 255, 0.4);
        line-height: 1.72;
        margin-bottom: 20px;
        max-width: 240px;
      }
      .f-socs {
        display: flex;
        gap: 8px;
      }
      .f-soc {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.08);
        color: rgba(255, 255, 255, 0.45);
        font-size: 0.9rem;
        transition: all 0.2s;
      }
      .f-soc:hover {
        background: var(--gold);
        color: var(--blue-dark);
        border-color: var(--gold);
      }
      .f-hd {
        font-size: 0.67rem;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--gold);
        margin-bottom: 18px;
      }
      .f-ul {
        list-style: none;
        padding: 0;
        margin: 0;
      }
      .f-ul li {
        margin-bottom: 11px;
      }
      .f-ul a {
        font-size: 0.83rem;
        color: rgba(255, 255, 255, 0.45);
        display: flex;
        align-items: center;
        gap: 9px;
        transition:
          color 0.2s,
          gap 0.2s;
      }
      .f-ul a::before {
        content: "";
        width: 12px;
        height: 1.5px;
        background: var(--gold);
        opacity: 0.35;
        border-radius: 2px;
        flex-shrink: 0;
        transition:
          width 0.2s,
          opacity 0.2s;
      }
      .f-ul a:hover {
        color: rgba(255, 255, 255, 0.85);
        gap: 13px;
      }
      .f-ul a:hover::before {
        width: 18px;
        opacity: 0.8;
      }
      .f-ct {
        display: flex;
        gap: 13px;
        align-items: flex-start;
        margin-bottom: 15px;
      }
      .f-ci {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        flex-shrink: 0;
        background: rgba(230, 168, 23, 0.1);
        border: 1px solid rgba(230, 168, 23, 0.18);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
        color: var(--gold);
      }
      .f-cl {
        font-size: 0.67rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: rgba(255, 255, 255, 0.3);
        font-weight: 600;
      }
      .f-cv {
        font-size: 0.83rem;
        color: rgba(255, 255, 255, 0.62);
        margin-top: 2px;
      }
      .f-sch {
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.07);
        border-radius: 10px;
        padding: 14px 16px;
        margin-top: 10px;
      }
      .f-sr {
        display: flex;
        justify-content: space-between;
        font-size: 0.79rem;
        color: rgba(255, 255, 255, 0.48);
        padding: 4px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
      }
      .f-sr:last-child {
        border: none;
      }
      .f-sr strong {
        color: rgba(255, 255, 255, 0.72);
        font-weight: 600;
      }
      .f-bot {
        border-top: 1px solid rgba(255, 255, 255, 0.06);
        padding: 20px 28px;
        max-width: 1180px;
        margin: 48px auto 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
      }
      .f-bot p {
        font-size: 0.76rem;
        color: rgba(255, 255, 255, 0.28);
        margin: 0;
      }
      .f-bot p a {
        color: rgba(255, 255, 255, 0.38);
      }
      .f-pills {
        display: flex;
        gap: 6px;
      }
      .f-pl {
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.07);
        border-radius: 6px;
        padding: 3px 10px;
        font-size: 0.68rem;
        color: rgba(255, 255, 255, 0.28);
      }
      .f-pl.gp {
        background: rgba(230, 168, 23, 0.08);
        border-color: rgba(230, 168, 23, 0.18);
        color: var(--gold);
      }

      .scroll-top {
        position: fixed;
        bottom: 28px;
        right: 28px;
        z-index: 800;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: var(--gold);
        color: var(--blue-dark);
        border: none;
        cursor: pointer;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: var(--sh-gold);
        opacity: 0;
        pointer-events: none;
        transition:
          opacity 0.3s,
          transform 0.25s,
          box-shadow 0.25s;
      }
      .scroll-top.show {
        opacity: 1;
        pointer-events: all;
      }
      .scroll-top:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 30px rgba(230, 168, 23, 0.55);
      }

      @media (max-width: 991px) {
        .nav-links {
          display: none;
        }
        .hamburger {
          display: block;
        }
        .hero {
          min-height: auto;
          padding: 90px 0 80px;
        }
        .hero-cut {
          display: none;
        }
        .hf-wrap {
          display: none;
        }
        .abadge {
          display: none;
        }
        .as-img-col {
          min-height: 260px;
        }
        .as-content {
          padding: 36px 28px;
        }
        .about-strip::after {
          display: none;
        }
      }
      @media (max-width: 575px) {
        .hs {
          border: none;
          padding: 0;
          margin: 0;
        }
        .hero-stats {
          gap: 12px;
        }
        .f-bot {
          flex-direction: column;
          text-align: center;
        }
        .as-kpis {
          gap: 12px;
        }
      }
    </style>
  </head>
  <body>
   <div class="nav-wrap" id="nav">
  <div class="nav-inner">
    <div class="logo">
      <div class="logo-ic"><i class="bi bi-heart-pulse-fill"></i></div>
      <div class="logo-txt">
        Cabinet Médical<span>Prestige · Casablanca</span>
      </div>
    </div>
    
    <div class="nav-links" id="navLinks">
      <a href="/">Accueil</a>
      <a href="#specialites">Spécialités</a>
      <a href="#medecins">Médecins</a>
      <a href="#about">À propos</a>
      <a href="#contact">Contact</a>
    </div>

    @auth
   
       <a href="/dashboard" class="btn-login d-none d-lg-inline-flex">
        <i class="bi bi-speedometer2"></i> Tableau de bord
      </a>
    @else
      <a href="{{ route('login') }}" class="btn-login d-none d-lg-inline-flex">
        <i class="bi bi-box-arrow-in-right"></i> Se connecter
      </a>
    @endauth

    <button class="hamburger" id="burger" onclick="toggleNav()">
      <i class="bi bi-list" id="bic"></i>
    </button>
  </div>

  <div class="mobile-nav" id="mNav">
    <a href="/" onclick="closeNav()">Accueil</a>
    <a href="#specialites" onclick="closeNav()">Spécialités</a>
    <a href="#medecins" onclick="closeNav()">Médecins</a>
    <a href="#about" onclick="closeNav()">À propos</a>
    <a href="#contact" onclick="closeNav()">Contact</a>
    
   @auth
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="btn-login d-none d-lg-inline-flex">
            <i class="bi bi-shield-lock me-1"></i> Panel Admin
        </a>
    @elseif(auth()->user()->role === 'doctor')
        <a href="{{ route('doctor.dashboard') }}" class="btn-login d-none d-lg-inline-flex">
            <i class="bi bi-stethoscope me-1"></i> Espace Docteur
        </a>
    @else
        <a href="{{ route('patient.dashboard') }}" class="btn-login d-none d-lg-inline-flex">
            <i class="bi bi-person-circle me-1"></i> Mon Espace
        </a>
    @endif
    @else
        <a href="{{ route('login') }}" class="btn-login d-none d-lg-inline-flex">
            <i class="bi bi-box-arrow-in-right me-1"></i> Se connecter
        </a>
    @endauth
  </div>
</div>

    <!-- ══════════════ HERO ══════════════ -->
    <section class="hero" id="home">
      <div class="hero-grid"></div>
      <div class="hero-glow hg1"></div>
      <div class="hero-glow hg2"></div>
      <div class="ring r1"></div>
      <div class="ring r2"></div>
      <div class="ring r3"></div>
      <div class="ptcls" id="ptcls"></div>
      <div class="hero-cut"></div>
      <div class="hero-inner">
        <div
          class="row align-items-center"
          style="min-height: 92vh; padding: 100px 0 130px"
        >
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="eyebrow reveal d1">
              <span class="eb-dot"></span>Cabinet agréé &nbsp;·&nbsp; Casablanca
            </div>
            <h1 class="hero-h reveal d2">
              <span class="ln">Votre santé,</span>
              <span class="ln">notre <em>priorité</em></span>
              <span
                class="ln"
                style="
                  font-size: 52%;
                  font-weight: 400;
                  color: rgba(255, 255, 255, 0.38);
                  font-style: italic;
                  margin-top: 8px;
                "
                >— depuis 2010 —</span
              >
            </h1>
            <p class="hero-sub reveal d3">
              Un cabinet pluridisciplinaire au cœur de Casablanca. Des médecins
              expérimentés, une prise en charge humaine et des soins de qualité
              pour toute la famille.
            </p>
            <div class="reveal d4">
              <a href="#specialites" class="btn-hero">
                <span class="bh-ic"
                  ><i class="bi bi-grid-3x3-gap-fill"></i
                ></span>
                Découvrir nos spécialités
              </a>
            </div>
            <div class="hero-stats reveal d5">
              <div class="hs">
                <div class="hs-v">14<sup>+</sup></div>
                <div class="hs-l">Années d'expérience</div>
              </div>
              <div class="hs">
                <div class="hs-v">12<sup>k</sup></div>
                <div class="hs-l">Patients traités</div>
              </div>
              <div class="hs">
                <div class="hs-v">8</div>
                <div class="hs-l">Spécialités médicales</div>
              </div>
              <div class="hs">
                <div class="hs-v">98<sup>%</sup></div>
                <div class="hs-l">Satisfaction patient</div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 offset-lg-1 reveal d3 fr">
            <div class="hf-wrap">
              <div class="abadge ab1">
                <div class="ab-ic" style="background: #eafaf1">
                  <i
                    class="bi bi-check-circle-fill"
                    style="color: #27ae60; font-size: 1rem"
                  ></i>
                </div>
                <div>
                  <div class="ab-v">4.9/5</div>
                  <div class="ab-l">Note moyenne</div>
                </div>
              </div>
              <div class="hf-card">
                <div class="hfc-title">
                  <i class="bi bi-people-fill"></i>Notre équipe médicale
                </div>
                <div class="dpill">
                  <div
                    class="dav"
                    style="
                      background: linear-gradient(135deg, var(--blue), #2dc3e8);
                    "
                  >
                    HA
                  </div>
                  <div>
                    <div class="dp-n">Dr. Hicham Alaoui</div>
                    <div class="dp-s">Cardiologue · 14 ans</div>
                  </div>
                  <span class="dp-b"
                    ><i class="bi bi-star-fill" style="font-size: 0.58rem"></i>
                    4.9</span
                  >
                </div>
                <div class="dpill">
                  <div
                    class="dav"
                    style="
                      background: linear-gradient(135deg, #8e44ad, #c0392b);
                    "
                  >
                    SB
                  </div>
                  <div>
                    <div class="dp-n">Dr. Sara Benchekroun</div>
                    <div class="dp-s">Ophtalmologue · 10 ans</div>
                  </div>
                  <span class="dp-b"
                    ><i class="bi bi-star-fill" style="font-size: 0.58rem"></i>
                    4.7</span
                  >
                </div>
                <div class="dpill">
                  <div
                    class="dav"
                    style="
                      background: linear-gradient(135deg, #27ae60, #2ecc71);
                    "
                  >
                    KT
                  </div>
                  <div>
                    <div class="dp-n">Dr. Khalid Tazi</div>
                    <div class="dp-s">Généraliste · 18 ans</div>
                  </div>
                  <span class="dp-b"
                    ><i class="bi bi-star-fill" style="font-size: 0.58rem"></i>
                    5.0</span
                  >
                </div>
                <div class="lock-hint">
                  <i class="bi bi-lock-fill"></i>Connectez-vous pour accéder aux
                  rendez-vous
                </div>
              </div>
              <div class="abadge ab2">
                <div class="ab-ic" style="background: var(--gold-lt)">
                  <i
                    class="bi bi-award-fill"
                    style="color: var(--gold-dk); font-size: 1rem"
                  ></i>
                </div>
                <div>
                  <div class="ab-v">Agréé</div>
                  <div class="ab-l">Ordre Médecins Maroc</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ══════════════ SPÉCIALITÉS ══════════════ -->
    <section
      id="specialites"
      style="padding: 110px 0; background: var(--white); position: relative"
    >
      <div
        style="
          position: absolute;
          top: 0;
          left: 0;
          width: 280px;
          height: 280px;
          background: radial-gradient(
            circle at 0% 0%,
            rgba(230, 168, 23, 0.06),
            transparent 70%
          );
          pointer-events: none;
        "
      ></div>
      <div class="wrap">
        <div class="row align-items-end mb-5">
          <div class="col-lg-6 reveal">
            <div class="s-eye">Nos expertises</div>
            <h2 class="s-title">
              Des soins <em>spécialisés</em><br />pour chaque besoin
            </h2>
            <p class="s-desc">
              Huit spécialités réunies sous un même toit pour une prise en
              charge globale, personnalisée et continue.
            </p>
          </div>
          <div class="col-lg-5 offset-lg-1 mt-4 mt-lg-0 reveal fr">
            <div
              style="
                background: var(--off);
                border: 1.5px solid var(--border);
                border-radius: 14px;
                padding: 20px 22px;
              "
            >
              <div
                style="
                  font-size: 0.74rem;
                  font-weight: 700;
                  color: var(--muted);
                  text-transform: uppercase;
                  letter-spacing: 1.5px;
                  margin-bottom: 14px;
                "
              >
                En chiffres
              </div>
              <div class="row g-3 text-center">
                <div class="col-4">
                  <div
                    style="
                      font-family: &quot;Cormorant Garamond&quot;, serif;
                      font-size: 1.9rem;
                      font-weight: 700;
                      color: var(--blue);
                    "
                  >
                    8
                  </div>
                  <div style="font-size: 0.72rem; color: var(--muted)">
                    Spécialités
                  </div>
                </div>
                <div
                  class="col-4"
                  style="
                    border-left: 1px solid var(--border);
                    border-right: 1px solid var(--border);
                  "
                >
                  <div
                    style="
                      font-family: &quot;Cormorant Garamond&quot;, serif;
                      font-size: 1.9rem;
                      font-weight: 700;
                      color: var(--blue);
                    "
                  >
                    12
                  </div>
                  <div style="font-size: 0.72rem; color: var(--muted)">
                    Médecins
                  </div>
                </div>
                <div class="col-4">
                  <div
                    style="
                      font-family: &quot;Cormorant Garamond&quot;, serif;
                      font-size: 1.9rem;
                      font-weight: 700;
                      color: var(--gold-dk);
                    "
                  >
                    24h
                  </div>
                  <div style="font-size: 0.72rem; color: var(--muted)">
                    RDV en ligne
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row g-3">
          <div class="col-sm-6 col-lg-3 reveal d1">
            <div class="sp-card">
              <div class="sp-ic">
                <i
                  class="bi bi-heart-pulse-fill"
                  style="color: var(--blue)"
                ></i>
              </div>
              <div class="sp-t">Cardiologie</div>
              <div class="sp-d">
                Bilan cardiaque, ECG, écho-cœur et suivi des pathologies
                cardiovasculaires.
              </div>
              <div class="sp-l">
                Découvrir <i class="bi bi-arrow-right"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 reveal d2">
            <div class="sp-card">
              <div class="sp-ic">
                <i class="bi bi-eye-fill" style="color: var(--blue)"></i>
              </div>
              <div class="sp-t">Ophtalmologie</div>
              <div class="sp-d">
                Examen visuel complet, glaucome, DMLA et correction optique
                spécialisée.
              </div>
              <div class="sp-l">
                Découvrir <i class="bi bi-arrow-right"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 reveal d3">
            <div class="sp-card">
              <div class="sp-ic">
                <i class="bi bi-activity" style="color: var(--blue)"></i>
              </div>
              <div class="sp-t">Médecine Générale</div>
              <div class="sp-d">
                Consultations de premier recours, bilans de santé et prévention.
              </div>
              <div class="sp-l">
                Découvrir <i class="bi bi-arrow-right"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 reveal d4">
            <div class="sp-card">
              <div class="sp-ic">
                <i class="bi bi-bandaid-fill" style="color: var(--blue)"></i>
              </div>
              <div class="sp-t">Dermatologie</div>
              <div class="sp-d">
                Acné, eczéma, psoriasis et dermoscopie pour dépistage cutané
                précoce.
              </div>
              <div class="sp-l">
                Découvrir <i class="bi bi-arrow-right"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 reveal d1">
            <div class="sp-card">
              <div class="sp-ic">
                <i class="bi bi-lungs-fill" style="color: var(--blue)"></i>
              </div>
              <div class="sp-t">Pneumologie</div>
              <div class="sp-d">
                Asthme, BPCO, apnée du sommeil et pathologies respiratoires.
              </div>
              <div class="sp-l">
                Découvrir <i class="bi bi-arrow-right"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 reveal d2">
            <div class="sp-card">
              <div class="sp-ic">
                <i class="bi bi-capsule-pill" style="color: var(--blue)"></i>
              </div>
              <div class="sp-t">Endocrinologie</div>
              <div class="sp-d">
                Diabète, thyroïde, déséquilibres hormonaux et éducation
                thérapeutique.
              </div>
              <div class="sp-l">
                Découvrir <i class="bi bi-arrow-right"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 reveal d3">
            <div class="sp-card">
              <div class="sp-ic">
                <i class="bi bi-person-walking" style="color: var(--blue)"></i>
              </div>
              <div class="sp-t">Rhumatologie</div>
              <div class="sp-d">
                Arthrite, arthrose, lombalgies et maladies auto-immunes
                articulaires.
              </div>
              <div class="sp-l">
                Découvrir <i class="bi bi-arrow-right"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 reveal d4">
            <div class="sp-card feat">
              <div class="sp-ic">
                <i
                  class="bi bi-camera-video-fill"
                  style="color: var(--gold)"
                ></i>
              </div>
              <div class="sp-t">Téléconsultation</div>
              <div class="sp-d" style="color: rgba(255, 255, 255, 0.6)">
                Consultez depuis chez vous pour suivi, ordonnance ou premier
                avis médical.
              </div>
              <div class="sp-l">
                Découvrir <i class="bi bi-arrow-right"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ══════════════ MÉDECINS + ABOUT ══════════════ -->
    <section id="medecins">
      <div class="wrap" style="padding: 110px 28px 0">
        <div class="text-center reveal" style="margin-bottom: 52px">
          <div class="s-eye" style="justify-content: center">Notre équipe</div>
          <h2 class="s-title">
            Des médecins <em>passionnés</em>,<br />à votre écoute
          </h2>
          <p class="s-desc" style="max-width: 500px; margin: 0 auto">
            Une équipe pluridisciplinaire engagée pour votre bien-être, avec
            compassion et professionnalisme.
          </p>
        </div>

        {{-- <div class="row g-4">
          <div class="col-md-6 col-lg-3 reveal d1">
            <div class="doc-card">
              <div class="dc-head">
                <div
                  class="dc-av"
                  style="
                    background: linear-gradient(135deg, var(--blue), #2dc3e8);
                  "
                >
                  HA
                </div>
                <div style="flex: 1">
                  <div class="dc-name">Dr. Hicham Alaoui</div>
                  <div class="dc-spec">
                    <i class="bi bi-heart-pulse me-1"></i>Cardiologue
                  </div>
                  <div class="dc-stars">
                    <i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i><span>4.9 · 128 avis</span>
                  </div>
                </div>
                <div class="dc-exp">14 ans</div>
              </div>
              <div class="dc-body">
                <div>
                  <span class="dc-tag">ECG</span
                  ><span class="dc-tag">Écho-cœur</span
                  ><span class="dc-tag">Holter</span>
                </div>
                <div class="dc-hor">
                  <i
                    class="bi bi-clock-fill"
                    style="color: var(--gold-dk); flex-shrink: 0"
                  ></i
                  >Lun – Ven · 08h – 17h
                </div>
                <div class="dc-lock">
                  <i class="bi bi-lock-fill"></i
                  ><span
                    ><a href="login.html">Connectez-vous</a> pour prendre
                    RDV</span
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 reveal d2">
            <div class="doc-card">
              <div class="dc-head">
                <div
                  class="dc-av"
                  style="background: linear-gradient(135deg, #8e44ad, #c0392b)"
                >
                  SB
                </div>
                <div style="flex: 1">
                  <div class="dc-name">Dr. Sara Benchekroun</div>
                  <div class="dc-spec">
                    <i class="bi bi-eye me-1"></i>Ophtalmologue
                  </div>
                  <div class="dc-stars">
                    <i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-half"></i><span>4.7 · 94 avis</span>
                  </div>
                </div>
                <div class="dc-exp">10 ans</div>
              </div>
              <div class="dc-body">
                <div>
                  <span class="dc-tag">Myopie</span
                  ><span class="dc-tag">Glaucome</span
                  ><span class="dc-tag">DMLA</span>
                </div>
                <div class="dc-hor">
                  <i
                    class="bi bi-clock-fill"
                    style="color: var(--gold-dk); flex-shrink: 0"
                  ></i
                  >Mar – Sam · 09h – 17h
                </div>
                <div class="dc-lock">
                  <i class="bi bi-lock-fill"></i
                  ><span
                    ><a href="login.html">Connectez-vous</a> pour prendre
                    RDV</span
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 reveal d3">
            <div class="doc-card">
              <div class="dc-head">
                <div
                  class="dc-av"
                  style="background: linear-gradient(135deg, #27ae60, #2ecc71)"
                >
                  KT
                </div>
                <div style="flex: 1">
                  <div class="dc-name">Dr. Khalid Tazi</div>
                  <div class="dc-spec">
                    <i class="bi bi-activity me-1"></i>Médecin Généraliste
                  </div>
                  <div class="dc-stars">
                    <i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i><span>5.0 · 203 avis</span>
                  </div>
                </div>
                <div class="dc-exp">18 ans</div>
              </div>
              <div class="dc-body">
                <div>
                  <span class="dc-tag">Bilan</span
                  ><span class="dc-tag">Vaccination</span
                  ><span class="dc-tag">Suivi</span>
                </div>
                <div class="dc-hor">
                  <i
                    class="bi bi-clock-fill"
                    style="color: var(--gold-dk); flex-shrink: 0"
                  ></i
                  >Lun – Sam · 08h – 12h
                </div>
                <div class="dc-lock">
                  <i class="bi bi-lock-fill"></i
                  ><span
                    ><a href="login.html">Connectez-vous</a> pour prendre
                    RDV</span
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 reveal d4">
            <div class="doc-card">
              <div class="dc-head">
                <div
                  class="dc-av"
                  style="background: linear-gradient(135deg, #e74c3c, #e67e22)"
                >
                  NM
                </div>
                <div style="flex: 1">
                  <div class="dc-name">Dr. Nadia Moussaoui</div>
                  <div class="dc-spec">
                    <i class="bi bi-bandaid me-1"></i>Dermatologue
                  </div>
                  <div class="dc-stars">
                    <i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i><i class="bi bi-star"></i
                    ><span>4.6 · 76 avis</span>
                  </div>
                </div>
                <div class="dc-exp">9 ans</div>
              </div>
              <div class="dc-body">
                <div>
                  <span class="dc-tag">Acné</span
                  ><span class="dc-tag">Eczéma</span
                  ><span class="dc-tag">Dermoscopie</span>
                </div>
                <div class="dc-hor">
                  <i
                    class="bi bi-clock-fill"
                    style="color: var(--gold-dk); flex-shrink: 0"
                  ></i
                  >Lun – Ven · 14h – 18h
                </div>
                <div class="dc-lock">
                  <i class="bi bi-lock-fill"></i
                  ><span
                    ><a href="login.html">Connectez-vous</a> pour prendre
                    RDV</span
                  >
                </div>
              </div>
            </div>
          </div>
        </div> --}}
<div class="row g-4 mb-3 p-5 " >
  <div class="col-md-6 col-lg-3 reveal d1">
    <div class="doc-card">
      <div class="dc-head">
        <div class="dc-av" style="background: linear-gradient(135deg, var(--blue), #2dc3e8);">HA</div>
        <div style="flex: 1;">
          <div class="dc-name">Dr. Hicham Alaoui</div>
          <div class="dc-spec"><i class="bi bi-heart-pulse me-1"></i>Cardiologue</div>
          <div class="dc-stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            <span>4.9</span>
          </div>
        </div>
        <div class="dc-exp">14 ans</div>
      </div>
      <div class="dc-body">
        <div class="mb-3">
          <span class="dc-tag">ECG</span><span class="dc-tag">Écho-cœur</span><span class="dc-tag">Holter</span>
        </div>
        <p class="small text-muted" style="line-height: 1.5;">
          Expert en cardiologie interventionnelle avec plus de 14 ans d'expérience au CHU de Casablanca.
        </p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3 reveal d2">
    <div class="doc-card">
      <div class="dc-head">
        <div class="dc-av" style="background: linear-gradient(135deg, #8e44ad, #c0392b);">SB</div>
        <div style="flex: 1;">
          <div class="dc-name">Dr. Sara Benchekroun</div>
          <div class="dc-spec"><i class="bi bi-eye me-1"></i>Ophtalmologue</div>
          <div class="dc-stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
            <span>4.7</span>
          </div>
        </div>
        <div class="dc-exp">10 ans</div>
      </div>
      <div class="dc-body">
        <div class="mb-3">
          <span class="dc-tag">Myopie</span><span class="dc-tag">Glaucome</span><span class="dc-tag">DMLA</span>
        </div>
        <p class="small text-muted" style="line-height: 1.5;">
          Experte reconnue en chirurgie réfractive et traitement des pathologies oculaires complexes.
        </p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3 reveal d3">
    <div class="doc-card">
      <div class="dc-head">
        <div class="dc-av" style="background: linear-gradient(135deg, #27ae60, #2ecc71);">KT</div>
        <div style="flex: 1;">
          <div class="dc-name">Dr. Khalid Tazi</div>
          <div class="dc-spec"><i class="bi bi-activity me-1"></i>Généraliste</div>
          <div class="dc-stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            <span>5.0</span>
          </div>
        </div>
        <div class="dc-exp">18 ans</div>
      </div>
      <div class="dc-body">
        <div class="mb-3">
          <span class="dc-tag">Bilan</span><span class="dc-tag">Vaccin</span><span class="dc-tag">Suivi</span>
        </div>
        <p class="small text-muted" style="line-height: 1.5;">
          Prise en charge globale des patients avec une approche centrée sur la prévention familiale.
        </p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3 reveal d4">
    <div class="doc-card">
      <div class="dc-head">
        <div class="dc-av" style="background: linear-gradient(135deg, #e74c3c, #e67e22);">NM</div>
        <div style="flex: 1;">
          <div class="dc-name">Dr. Nadia Moussaoui</div>
          <div class="dc-spec"><i class="bi bi-bandaid me-1"></i>Dermatologue</div>
          <div class="dc-stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
            <span>4.6</span>
          </div>
        </div>
        <div class="dc-exp">9 ans</div>
      </div>
      <div class="dc-body">
        <div class="mb-3">
          <span class="dc-tag">Acné</span><span class="dc-tag">Eczéma</span><span class="dc-tag">Laser</span>
        </div>
        <p class="small text-muted" style="line-height: 1.5;">
          Spécialisée dans les soins dermatologiques avancés et les traitements esthétiques cutanés.
        </p>
      </div>
    </div>
  </div>
</div>

        <!-- ═══ ABOUT STRIP : Image + Description ═══ -->
      </div>
    </section>

    <div
      class="about-strip reveal mt-9 mb-5 container"
      id="about"
      style="margin-top: 80px; margin-bottom: -1px"
    >
      <div class="as-bar"></div>
      <div class="row g-0">
        <!-- IMAGE PROFESSIONNELLE -->
        <div class="col-lg-5 order-lg-1 order-2 as-img-col">
          <img
            src="https://images.unsplash.com/photo-1582750433449-648ed127bb54"
            alt="Cabinet médical"
            style="width: 100%; height: 100%; object-fit: cover; display: block"
          />

          <div class="as-img-tag">
            <i class="bi bi-shield-fill-check"></i>
            Cabinet certifié
          </div>
        </div>

        <!-- DESCRIPTION -->
        <div class="col-lg-7 order-lg-2 order-1">
          <div class="as-content">
            <div class="as-eye">À propos de nous</div>

            <h2 class="as-title">
              Un cabinet <em>moderne</em><br />
              dédié à votre santé
            </h2>

            <p class="as-desc">
              Situé au cœur de Casablanca, notre cabinet médical regroupe des
              spécialistes expérimentés offrant des soins de qualité dans un
              environnement moderne et sécurisé. Nous mettons l’accent sur une
              prise en charge personnalisée et un suivi continu pour chaque
              patient.
            </p>

            <!-- FEATURES -->
            <div class="as-feats">
              <div class="asf">
                <div class="asf-n">01</div>
                <div>
                  <div class="asf-t">
                    <i
                      class="bi bi-calendar-check me-2"
                      style="color: var(--gold)"
                    ></i>
                    Prise de rendez-vous simple
                  </div>
                  <div class="asf-d">
                    Réservez vos consultations rapidement via notre plateforme
                    en ligne.
                  </div>
                </div>
              </div>

              <div class="asf">
                <div class="asf-n">02</div>
                <div>
                  <div class="asf-t">
                    <i
                      class="bi bi-heart-pulse me-2"
                      style="color: var(--gold)"
                    ></i>
                    Suivi médical complet
                  </div>
                  <div class="asf-d">
                    Un accompagnement personnalisé pour assurer votre bien-être
                    à long terme.
                  </div>
                </div>
              </div>

              <div class="asf">
                <div class="asf-n">03</div>
                <div>
                  <div class="asf-t">
                    <i
                      class="bi bi-shield-check me-2"
                      style="color: var(--gold)"
                    ></i>
                    Équipe certifiée
                  </div>
                  <div class="asf-d">
                    Des médecins qualifiés et reconnus pour leur expertise.
                  </div>
                </div>
              </div>
            </div>

            <!-- KPI -->
            <div class="as-kpis">
              <div class="as-kpi">
                <div class="as-kpi-v">14+</div>
                <div class="as-kpi-l">Années d’expérience</div>
              </div>
              <div class="as-kpi">
                <div class="as-kpi-v">12k</div>
                <div class="as-kpi-l">Patients</div>
              </div>
              <div class="as-kpi">
                <div class="as-kpi-v">8</div>
                <div class="as-kpi-l">Spécialités</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ══════════════ FOOTER ══════════════ -->
    <footer>
      <div class="f-inner mt-5">
        <div class="row g-5" style="padding: 0 0 56px">
          <div class="col-lg-4 col-md-6">
            <div class="f-logo">
              <div class="f-lic"><i class="bi bi-heart-pulse-fill"></i></div>
              <div class="f-lt">
                Cabinet Médical<span>Prestige · Marrakech</span>
              </div>
            </div>
            <p class="f-tag">
              Cabinet pluridisciplinaire de confiance au service de votre santé
              depuis 2010. Équipe médicale certifiée, soins personnalisés.
            </p>
            <div class="f-socs">
              <a class="f-soc" href="#"><i class="bi bi-facebook"></i></a>
              <a class="f-soc" href="#"><i class="bi bi-instagram"></i></a>
              <a class="f-soc" href="#"><i class="bi bi-linkedin"></i></a>
              <a class="f-soc" href="#"><i class="bi bi-whatsapp"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="f-hd">Navigation</div>
            <ul class="f-ul">
              <li><a href="#home">Accueil</a></li>
              <li><a href="#specialites">Spécialités</a></li>
              <li><a href="#medecins">Notre équipe</a></li>
              <li><a href="#about">À propos</a></li>
              <li><a href="#">Actualités santé</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="f-hd">Spécialités</div>
            <ul class="f-ul">
              <li><a href="#">Cardiologie</a></li>
              <li><a href="#">Ophtalmologie</a></li>
              <li><a href="#">Médecine générale</a></li>
              <li><a href="#">Dermatologie</a></li>
              <li><a href="#">Pneumologie</a></li>
              <li><a href="#">Endocrinologie</a></li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="f-hd">Contact &amp; Horaires</div>
            <div class="f-ct">
              <div class="f-ci"><i class="bi bi-geo-alt-fill"></i></div>
              <div>
                <div class="f-cl">Adresse</div>
                <div class="f-cv">
                  123 Boulevard,<br />Marrakech 40000, Maroc
                </div>
              </div>
            </div>
            <div class="f-ct">
              <div class="f-ci"><i class="bi bi-telephone-fill"></i></div>
              <div>
                <div class="f-cl">Téléphone</div>
                <div class="f-cv">+212 767890439</div>
              </div>
            </div>
            <div class="f-ct">
              <div class="f-ci"><i class="bi bi-envelope-fill"></i></div>
              <div>
                <div class="f-cl">Email</div>
                <div class="f-cv">contact@cabinet-prestige.ma</div>
              </div>
            </div>
            <div class="f-ct">
                <div class="f-ci"><i class="bi bi-person-badge-fill"></i></div>
                <div>
                    <div class="f-cl">Product By Abdellah EL-ouannas 2026</div>
                    <div class="f-cv">a.elouannas@uca.ac.ma</div>
                </div>
            </div>
            {{-- <div class="f-sch">
              <div class="f-sr">
                <span>Lundi – Vendredi</span><strong>08h00 – 18h00</strong>
              </div>
              <div class="f-sr">
                <span>Samedi</span><strong>08h00 – 13h00</strong>
              </div>
              <div class="f-sr">
                <span>Dimanche</span
                ><strong style="color: rgba(255, 255, 255, 0.32)">Fermé</strong>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
      <div class="f-bot">
        <p>
          © 2025 Cabinet Médical Prestige. Tous droits réservés. ·
          <a href="#">Confidentialité</a> · <a href="#">CGU</a>
        </p>
        <div class="f-pills">
          <span class="f-pl">Laravel 11</span
          ><span class="f-pl">Bootstrap 5</span
          ><span class="f-pl gp">v1.0</span>
        </div>
      </div>
    </footer>

    <button
      class="scroll-top"
      id="scrollTop"
      onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
    >
      <i class="bi bi-arrow-up"></i>
    </button>

<style>
    .dc-head {
    display: flex;
    align-items: flex-start; /* Aligne les éléments en haut */
    gap: 14px;
    position: relative;
}

.dc-exp {
    margin-left: auto; /* Pousse l'élément à l'extrémité droite */
    background: var(--gold-lt);
    color: var(--gold-dk);
    border-radius: 20px;
    padding: 4px 12px;
    font-size: 0.75rem;
    font-weight: 700;
    white-space: nowrap; /* Évite que "14 ans" ne revienne à la ligne */
    border: 1px solid rgba(230, 168, 23, 0.25);
}
</style>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      const nav = document.getElementById("nav");
      window.addEventListener("scroll", () => {
        nav.classList.toggle("solid", window.scrollY > 40);
        document
          .getElementById("scrollTop")
          .classList.toggle("show", window.scrollY > 400);
      });
      function toggleNav() {
        const m = document.getElementById("mNav"),
          ic = document.getElementById("bic"),
          o = m.classList.toggle("open");
        ic.className = o ? "bi bi-x-lg" : "bi bi-list";
      }
      function closeNav() {
        document.getElementById("mNav").classList.remove("open");
        document.getElementById("bic").className = "bi bi-list";
      }
      // Particules
      (function () {
        const c = document.getElementById("ptcls");
        for (let i = 0; i < 20; i++) {
          const p = document.createElement("div");
          p.className = "pt";
          const s = Math.random() * 4 + 2;
          p.style.cssText = `width:${s}px;height:${s}px;left:${Math.random() * 100}%;bottom:-${s}px;animation-duration:${11 + Math.random() * 16}s;animation-delay:${Math.random() * 13}s;`;
          c.appendChild(p);
        }
      })();
      // Reveal
      const io = new IntersectionObserver(
        (en) => {
          en.forEach((e) => {
            if (e.isIntersecting) {
              e.target.classList.add("vis");
              io.unobserve(e.target);
            }
          });
        },
        { threshold: 0.12 },
      );
      document.querySelectorAll(".reveal").forEach((el) => {
        if (el.closest(".hero")) setTimeout(() => el.classList.add("vis"), 80);
        else io.observe(el);
      });
      // Active nav
      const secs = document.querySelectorAll("section[id]");
      window.addEventListener("scroll", () => {
        let c = "";
        secs.forEach((s) => {
          if (window.scrollY >= s.offsetTop - 100) c = s.id;
        });
        document.querySelectorAll(".nav-links a,.mobile-nav a").forEach((a) => {
          a.style.fontWeight = a.getAttribute("href") === "#" + c ? "700" : "";
        });
      });
    </script>
  </body>
</html>
