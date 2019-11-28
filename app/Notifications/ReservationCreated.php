<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationCreated extends Notification
{
	use Queueable;
	
	/**
	 * Get the notification's delivery channels.
	 *
	 * @param mixed $notifiable
	 * @return array
	 */
	public function via($notifiable)
	{
		return ['mail'];
	}
	
	/**
	 * Get the mail representation of the notification.
	 *
	 * @param mixed $notifiable
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail($notifiable)
	{
		return (new MailMessage)
			->level('info')
			->subject('Reserva realizada com sucesso!')
			->greeting('Olá!')
			->line('Informamos que sua reserva foi realizada com sucesso!')
			
//			->action('Visualizar clientes', url('/clientes'))
			->salutation('Sistema Hotel');
	}
}
