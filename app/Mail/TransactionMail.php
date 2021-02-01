<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class TransactionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($files, $request)
    {
        $this->files = $files;
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->from($this->request['sender'])
        ->view('transaction')->with("body", $this->request['content'])
        ->subject($this->request['subject']);
        if(count($this->files)) {
            foreach($this->files as $file) {
                $email->attach($file);
            }
        }
        return $email;
    }
}
