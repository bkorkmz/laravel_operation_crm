<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;;
use Illuminate\Queue\SerializesModels;

/**
 * Class Companynew
 * @package App\Mail
 * Firma başvuru yapan  kişilere gönderilen mail içeriğidir.
 * Başvuru onaylanmadan önce bilgi maili gönderilir.
 * Firma  bilgileri içermektedir.
 * @author Burak Korkmaz <
 * @version 1.0.0
 *
 */
class testScoreSendMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    
    public $data;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        
        $this->data = $data;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = [
            "email" => $this->data['email'],
            "test_name" => $this->data['test_name'],
            "true" => $this->data['true'],
            "false" => $this->data['false'],
            "create_date" => $this->data['create_date'],
        ];
        
        return $this->markdown('emails.testScore')->subject('Bir  Mesajınız var !!')
            ->with('user', $user);
    }
}
