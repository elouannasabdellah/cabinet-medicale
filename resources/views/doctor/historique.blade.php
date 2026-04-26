@extends('layouts.doctor')

@section('page-content')


<div class="container py-4">
    <h2 class="fw-bold mb-4" style="color: #0d6efd;">Gestion des Consultations</h2>
    
    <div class="table-responsive shadow-sm rounded-4">
        <table class="table table-hover align-middle mb-0 bg-white">
            <thead style="background-color: #0d6efd; color: white;">
                <tr>
                    <th class="py-3 px-4">Date</th>
                    <th>Patient</th> {{-- Important pour le Docteur --}}
                    <th>Diagnostic</th>
                    <th>Observations</th>
                    {{-- <th class="text-center">Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($consultations as $c)
                <tr>
                    <td class="px-4">{{ $c->created_at->format('d/m/Y H:i') }}</td>
                    <td class="fw-bold text-primary">{{ $c->patient->user->name }}</td>
                    <td class="pt-2 py-2" ><span class="badge bg-warning text-dark">{{ $c->diagnostic }}</span></td>
                    <td class="small pt-2 py-2 ">{{ Str::limit($c->observations, 50) }}</td>
                    <td class="text-center">
                        {{-- <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> Voir</a>
                        <a href="#" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection