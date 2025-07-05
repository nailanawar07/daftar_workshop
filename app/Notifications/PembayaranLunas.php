<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PembayaranLunas extends Notification
{
    use Queueable;

    public function __construct() {}

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Pembayaran Workshop Anda Sudah Lunas')
            ->greeting('Halo ' . $notifiable->name . '!')
            ->line('Pembayaran workshop Anda telah kami konfirmasi sebagai **LUNAS**.')
            ->line('Tunjukkan email ini saat menghadiri workshop.')
            ->line('Terima kasih telah mendaftar!')
            ->salutation('Salam, Tim Workshop');
    }
}
