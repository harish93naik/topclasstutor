<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class StatusUpdateMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $username;
    public $status;
    public $email;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username,$status,$email)
    {
        $this->username = $username;
        $this->status = $status;
        $this->email = $email;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

      return $this->from('harish.tedroox@gmail.com')->subject("Regarding Activation")->markdown('emails.status-update');
    }
}