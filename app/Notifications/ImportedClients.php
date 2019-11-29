<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ImportedClients extends Notification
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
			->subject('Importação de Clientes')
			->greeting('Olá!')
			->line('Informamos que a importação do arquivo CSV com as informações dos clientes foi realizada com sucesso!')
			->line('Para visualizar as informações importadas, clique no botão abaixo:')
			->action('Visualizar clientes', url('/clientes'))
			->salutation('Sistema Hotel');
	}
}
