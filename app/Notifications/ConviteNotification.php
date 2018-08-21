<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ConviteNotification extends Notification
{
    use Queueable;
    private $nome;
    private $email;
    private $cpf;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($nome, $email, $cpf, $password)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $greetings = "Olá " . mb_convert_case($this->nome, MB_CASE_TITLE, 'UTF-8');
        return (new MailMessage)
            ->subject('Notificação de Cadastro')
            ->greeting($greetings)
            ->line('Este e-mail foi enviado porque seu e-mail foi registrado para utilização no sistema de planilhas online InformativoIPB da Igreja Presbiteriana do Brasil.')
            ->line("Email: $this->email")
            ->line("CPF: $this->cpf")
            ->line("Senha: $this->password")
            ->action('Acessar Sistema', url('/login'))
            ->line('Obrigado por fazer parte da equipe!')
            //->salutation('Atenciosamente,')
            ->salutation('InformativoIPB')
            ->success();
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
