<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

// Video 39: Creado clase para notificar cuando un usuario es seguido

class UserFollowed extends Notification
{
    use Queueable;

    public $follower;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( User $follower)     // a quien se sigue , se le notifica
    {
        // Video 39: configura variables q sean publicas
        $this->follower = $follower;
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];        //al email y a la BD
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    // ->line('The introduction to the notification.')
                    // ->action('Notification Action', url('/'))
                    // ->line('Thank you for using our application!');
                    ->subject('Tienes un nuevo seguidor! - Laravel DC')
                    ->greeting('Hola, '.$notifiable->name)
                    ->line('El usuario @'.$this->follower->username.' te ha seguido.')
                    ->action('Ver perfil', url('/'.$this->follower->username) )
                    ->line('Recuerda, puedes mantener conversaciones con @'.$this->follower->username.' desde el enlace.')
                    ->salutation('Gracias por usar Laravel DC!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)        // puede guiardar datos en BD
    {
        return [
            // Video 40: Guarda los datos del usuario q lo sigue 
            'follower' => $this->follower,
        ];
    }
}
