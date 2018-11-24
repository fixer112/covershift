<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Invoice;

class OrderSuccess extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $invoice;
    public function __construct(Invoice $invoice)
    {
        //
        $this->invoice = $invoice;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mail = new MailMessage;
        $mail->subject('Order #'.$this->invoice->invoice_id.' paid');
        $mail->greeting('Hello '.$this->invoice->user->fname);
        $mail->line('You have successfully paid for Order #'.$this->invoice->invoice_id);
        $mail->action('Download reciept', url('/reciept/'.$this->invoice->invoice_id.'.pdf'));
        /*$mail->line("Service : ".$this->invoice->title);
        $mail->line(" Price/Hour: ".$this->invoice->price);
        $mail->line("Number of Days : ".$this->invoice->days_needed);
        $mail->line("Number of Staff(s) : ".$this->invoice->staff_num);
        $mail->line("Number of Hours(s) : ".$this->invoice->shift_hour);
        if ($this->invoice->van) {
        $mail->line("Number of Hours needed for Van: ".$this->invoice->van_hour);
        }
        $mail->line("Dates : ".$this->invoice->dates);
        $mail->line("Summary to staff : ".$this->invoice->summary);*/
        $mail->line('Thank you!');

        return $mail;

        /*return (new MailMessage)
                    ->subject('Service #'.$this->invoice->invoice_id.' paid')
                    ->greeting('Hello '$this->invoice->user->fname)
                    ->line('You have successfully paid for Service #'.$this->invoice->invoice_id)
                    ->action('Download reciept', url('/reciept/'.$this->invoice->invoice_id.'pdf'))
                    ->line("Service : ".$invoice->title);
                    ->line(" Price/Hour: ".$invoice->price);
                    ->line("Number of Days : ".$invoice->days_needed);
                    ->line("Number of Staff(s) : ".$invoice->staff_num);
                    ->line("Number of Hours(s) : ".$invoice->shift_hour);
                    if ($invoice->van) {
                    $this->reciept->addParagraph("Number of Hours needed for Van: ".$invoice->van_hour);
                    }

                    $this->reciept->addParagraph("Dates : ".$invoice->dates);

                    $this->reciept->addParagraph("Summary to staff : ".$invoice->summary);
                    ->line('Thank you!');*/
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
}
