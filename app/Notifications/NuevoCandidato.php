<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{

    use Queueable;

    public $vacante_id;
    public $nombre_vacante;
    public $usuario_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacante_id, $nombre_vacante, $usuario_id)
    {
        //
        $this->vacante_id = $vacante_id;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $url = url('/notificaciones');

        return (new MailMessage)
            ->line('Has recibido un nuevo candidato en tu vacante.')
            ->line('La vacante es: ' . $this->nombre_vacante)
            ->action('Ver Notificaciones', $url)
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    // Almacenar las notificacion en la db
    public function toDatabase($notifiable)
    {
        return [
            'id_vacante' => $this->vacante_id,
            'nombre_vacante' => $this->nombre_vacante,
            'usuario_id' => $this->usuario_id
        ];
    }
}
