<?php

namespace App\Mail;

use App\ApprovalDish;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ManagerDeclineDishMail extends Mailable
{
    use Queueable, SerializesModels;
    public $approvalDish;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ApprovalDish $approvalDish)
    {
        $this->approvalDish = $approvalDish;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('info@eatchef.com', 'Eatchef')
            ->subject('Your Dish Decline')
            ->markdown('emails.manager.manager_decline_dish');
    }
}
