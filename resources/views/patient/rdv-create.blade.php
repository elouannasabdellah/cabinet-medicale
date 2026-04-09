
@extends('layouts.patient')

@section('page-content')
<div class="container py-4">
    <div class="card shadow-sm border-0 p-4">
        <h4 class="mb-4"><i class="fas fa-calendar-alt text-primary"></i> Prendre un rendez-vous</h4>
        
       <livewire:rdv-wizard />
    </div>
</div>
@endsection