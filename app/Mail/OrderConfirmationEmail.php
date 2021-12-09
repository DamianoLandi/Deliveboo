<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_order)
    {
        $this->order=$_order;
    }

    /**
     * Build the message.
     *public function build()
   * {
    *    $lead = $this->lead;
    *    return $this->replyTo($this->lead->email)->view('admin.email.body', compact('lead'));
   * }
     * @return $this
     */
    public function build()
    {
        $order=$this->order;
        return $this->view('mail.orderConfirmation',compact('order'));
    }
}
