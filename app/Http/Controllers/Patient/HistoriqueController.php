<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HistoriqueController extends Controller
{
  public function index()
  {

    return view('patient.historique');
  }

  public function ordonnance()
  {

    // On récupère les prescriptions du patient connecté
    // $ordonnances = Prescription::whereHas('consultation', function ($q) {
    //   $q->where('patient_id', auth()->id());
    // })->get()->groupBy('consultation_id');

    $ordonnances = Prescription::whereHas('consultation', function ($q) {
      $q->whereHas('patient', function ($query) {
        $query->where('user_id', auth()->id());
      });
    })->get()->groupBy('consultation_id');

    // $ordonnances = Prescription::all()->groupBy('consultation_id');

    return view('patient.ordonnance', ['ordonnances' => $ordonnances]);
  }

  public function downloadPDF($id)
  {
    $prescriptions = Prescription::where('consultation_id', $id)->get();

    if ($prescriptions->isEmpty()) {
      return "Aucune prescription trouvée.";
    }
    $infos = $prescriptions->first();

    $listeMedocs = "";
    foreach ($prescriptions as $p) {
      $listeMedocs .= "<li>" . $p->medicament_nom . " - " . $p->posologie . "</li>";
    }

    // Design simple pour le PDF
    $html = "
            <div style='font-family: sans-serif;'>
                <h1 style='color: #0d6efd;'>ORDONNANCE MÉDICALE</h1>
                <p><strong>Docteur :</strong> Dr. {$infos->consultation->doctor->name}</p>
                <p><strong>Patient :</strong> {$infos->consultation->patient->user->name}</p>
                <p><strong>Date :</strong> {$infos->created_at->format('d/m/Y')}</p>
                <hr>
                <table style='width: 100%; border-collapse: collapse;'>
                    <thead>
                        <tr style='background: #f8f9fa;'>
                            <th style='border: 1px solid #ddd; padding: 8px;'>Médicament</th>
                            <th style='border: 1px solid #ddd; padding: 8px;'>Posologie</th>
                            <th style='border: 1px solid #ddd; padding: 8px;'>Durée</th>
                        </tr>
                    </thead>
                    <tbody>";

    foreach ($prescriptions as $p) {
      $html .= "
                <tr>
                    <td style='border: 1px solid #ddd; padding: 8px;'>{$p->medicament_nom}</td>
                    <td style='border: 1px solid #ddd; padding: 8px;'>{$p->posologie}</td>
                    <td style='border: 1px solid #ddd; padding: 8px;'>{$p->duree}</td>
                </tr>";
    }

    $html .= "</tbody></table></div>";

    $pdf = Pdf::loadHTML($html);
    return $pdf->download('ordonnance-' . $id . '.pdf');
  }


}
