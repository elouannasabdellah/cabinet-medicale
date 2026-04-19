<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Appointment;
use App\Models\Doctor;
use Livewire\WithPagination; // <-- AJOUTER CETTE LIGNE

class MesRendezVous extends Component
{
 
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $status = '';
    public $doctorId = '';

    public $dateFilter="";

    public $activeTab = '';

    public function setTab($tab)
    {
        $this->activeTab = $tab;
        $this->resetPage(); // Revenir à la page 1 lors du changement d'onglet
    }

    public function render()
    {
        $patient = auth()->user()->patient;
        $query = Appointment::query()->where('patient_id', $patient->id)
            ->with('doctor');

        // 1. Logique des onglets (Filtre temporel et statut)
        if ($this->activeTab === 'upcoming') {
            $query->where('date', '>=', now()->toDateString())
                  ->whereIn('status', ['pending', 'confirmed']);
        } elseif ($this->activeTab === 'past') {
            $query->where('date', '<', now()->toDateString());
        } elseif ($this->activeTab === 'canceled') {
            $query->where('status', 'canceled');
        }

        if ($this->status) $query->where('status', $this->status);
        if ($this->doctorId) $query->where('doctor_id', $this->doctorId);
        
        if ($this->dateFilter) {
            $query->where('date', $this->dateFilter);
        }

        return view('livewire.mes-rendez-vous', [
            'appointments' => $query->latest()->paginate(10),
            'doctors' => Doctor::all(),
            'counts' => [
                'upcoming' => Appointment::where('patient_id', $patient->id)->whereIn('status', ['pending', 'confirmed'])->count(),  
                'past'  => Appointment::where('patient_id', $patient->id)->where('date', '<', now()->toDateString())->count(),           
                'canceled' => Appointment::where('patient_id', $patient->id)->where('status', 'canceled')->count(),           
             ]
        ]);
    }
}