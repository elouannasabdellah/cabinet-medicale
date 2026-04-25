
@extends('layouts.patient')

@section('page-content')
@if (session()->has('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Succès !',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false,
            borderRadius: '15px'
        });
    </script>
@endif
<div class="container py-4">
    <div class="card shadow-sm border-0 p-4">
        <h4 class="mb-4"><i class="fas fa-calendar-alt text-primary"></i> Prendre un rendez-vous</h4>
        
       <livewire:rdv-wizard />
       
    </div>
</div>

@if (session()->has('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Succès !',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false,
            borderRadius: '15px'
        });
    </script>
@endif
@endsection