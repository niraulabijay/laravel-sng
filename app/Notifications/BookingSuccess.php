<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingSuccess extends Notification
{
    use Queueable;

    public $booking;
    public $room;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($booking,$room)
    {
        //
        $this->booking = $booking;
        $this->room = $room;
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
       
        return (new MailMessage)
                    ->line('The Room has been Successfully Booked!')
                    ->line('Start Date'.' - '.$this->booking['check_in'])
                    ->line('End Date'.' - '.$this->booking['check_out'])
                    ->line('Room Name'.' - '.$this->room['title'])
                    ->line('Our Team will contact you soon!')
                    ->line('Thank you for Booking!');
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
