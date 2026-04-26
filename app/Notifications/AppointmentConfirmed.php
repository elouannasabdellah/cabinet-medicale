<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentConfirmed extends Notification
{
    use Queueable;


    protected $appointment;
    /**
     * Create a new notification instance.
     */
    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //         ->subject('Confirmation de votre rendez-vous')
    //         ->greeting('Bonjour ' . $this->appointment->patient->nom . ',')
    //         ->line('Votre rendez-vous a été confirmé par le médecin.')
    //         ->line('Détails :')
    //         // Utilisation de Carbon pour un format de date propre (ex: 26 Avril 2026)
    //         ->line('📅 Date : ' . \Carbon\Carbon::parse($this->appointment->date)->translatedFormat('d F Y'))
    //         ->line('⏰ Heure : ' . $this->appointment->time)
    //         ->action('Accéder à mon espace', url('/dashboard'))
    //         ->line('Merci de votre confiance !');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'appointment_id' => $this->appointment->id,
            'message' => "Votre rendez-vous du " . $this->appointment->date . " est confirmé !",
            'doctor_name' => $this->appointment->doctor->nom, // Assure-toi que la relation doctor existe
        ];
    }
}
