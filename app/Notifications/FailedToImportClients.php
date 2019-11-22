<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Maatwebsite\Excel\Events\ImportFailed;

class FailedToImportClients extends Notification
{
	use Queueable;
	
	private $_event;
	
	/**
	 * FailedToImportClients constructor.
	 * @param $_event
	 */
	public function __construct($_event)
	{
		$this->_event = $_event;
	}
	
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
			->error()
			->subject('Falha na Importação de Clientes')
			->greeting('Olá!')
			->line('Informamos que ocorreu um erro na importação do arquivo CSV com as informações dos clientes')
			->line("Erro: {$this->_event->e->getMessage()}")
			->salutation('Sistema Hotel');
	}
}
