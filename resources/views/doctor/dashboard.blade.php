@extends('layouts.patient')

@section('page-content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Tableau de bord</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-info">Accueil</a></li>
                    <li class="breadcrumb-item active">Doctor</li>
                </ol>
            </nav>
        </div>
      
    </div>
   

</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    body { background-color: #f8f9fa; }
    .card { transition: transform 0.2s; }
    .card:hover { transform: translateY(-5px); }
    .rounded-4 { border-radius: 1rem !important; }
    .bg-info { background-color: #17a2b8 !important; }
</style>
@endsection