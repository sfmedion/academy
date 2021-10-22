<?php

namespace App\Mail;

use App\Models\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestCreation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Making this public, it can be accessible using $request inside the markdown file.
     *
     * @var Request
     */
    public Request $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.request.creation');
    }
}
