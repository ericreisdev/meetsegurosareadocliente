<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPasswordNotification extends Notification
{
    use Queueable;

    // Adicione a propriedade token
    public $token;

    /**
     * Create a new notification instance.
     * Inclua o token no construtor
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/reset-password/'.$this->token);

        return (new MailMessage)
                    ->subject('Redefinição de Senha para Meet Seguros')
                    ->line('Você está recebendo este e-mail porque recebemos um pedido de redefinição de senha para sua conta.')
                    ->action('Redefinir Senha', $url)
                    ->line('Este link de redefinição de senha expirará em 60 minutos.')
                    ->line('Se você não solicitou uma redefinição de senha, nenhuma ação adicional é necessária.')
                    ->salutation('Atenciosamente, Equipe Meet Seguros');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            // Dados relevantes para a notificação
        ];
    }
}

// C:\laragon\www\public_html\areaDoCliente\app\Notifications\CustomResetPasswordNotification.php