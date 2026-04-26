<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentCancelled extends Notification
{
    use Queueable;

    protected $appointment;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //         ->subject('Information : Annulation de votre rendez-vous')
    //         ->greeting('Bonjour ' . $this->appointment->patient->nom . ',')
    //         ->line('Nous vous informons que votre rendez-vous prévu au cabinet a dû être annulé.')
    //         ->line('Voici les détails du rendez-vous concerné :')
    //         // Utilisation de Carbon pour le format de date
    //         ->line('📅 Date : ' . \Carbon\Carbon::parse($this->appointment->date)->translatedFormat('d F Y'))
    //         ->line('⏰ Heure : ' . $this->appointment->time)
    //         ->line('Nous nous excusons pour ce contretemps.')
    //         ->action('Reprendre un nouveau rendez-vous', url('/dashboard'))
    //         ->line('Vous pouvez choisir un nouveau créneau directement depuis votre espace patient.')
    //         ->line('Merci de votre compréhension.');
    // }

    public function toArray($notifiable)
    {
        return [
            'appointment_id' => $this->appointment->id,
            'message' => "Votre rendez-vous pour '" . $this->appointment->reason . "' a été annulé par le médecin.",
            'status' => 'cancelled', // C'est cette clé qui évite l'erreur "Undefined array key"
        ];
    }
}
