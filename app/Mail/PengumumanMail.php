<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengumumanMail extends Mailable
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
        $path = storage_path().'/app/dokumen_ramuan/'.$this->data['attachment'];
        
        $mail = $this->subject('Pengumuman Penting')->view('email/pengumuman');
        if(!is_null($this->data['attachment'])){
            $mail->attach($path);
        }
        
        return $mail;
    }
}
