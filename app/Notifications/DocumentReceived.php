<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;


class DocumentReceived extends Notification
{
    use Queueable;
    private $process_id;
    private  $status;
    private $document_name;
    public function __construct($status, $process_id)
    {
        $this->status = $status;
        $this->process_id = $process_id;
        $this->document_name = DB::table('processes')
            ->where('process_id', '=', $process_id)
            ->get('document_name')[0]->document_name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'status' => $this->status,
            'process_id' => $this->process_id,
            'document_name' => $this->document_name
        ];
    }
}
