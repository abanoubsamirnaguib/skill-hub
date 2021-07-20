<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RespondMAil extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $Subject , $Body , $Name ,$AdminName ;
    public function __construct( $Subject , $Body , $Name ,$AdminName)
    {
        $this->Subject = $Subject;
        $this->Body = $Body;
        $this->Name = $Name;
        $this->$AdminName = $AdminName;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com', 'Awesome Name')->view('Dashboard.Contacts.mail'); 
    }
}
