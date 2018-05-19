<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StandardMailBuilder extends Mailable
{
    use Queueable, SerializesModels;

    protected $mysubject;
    protected $viewpathstring;
    protected $viewdata;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $view, array $data = array())
    {
        $this->mysubject      = config('pandapix.emails.subject_prefix') . $subject;
        $this->viewpathstring = $view;
        $this->viewdata       = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('pandapix.emails.from'))
            ->subject($this->mysubject)
            ->view($this->viewpathstring)
            ->with('data',$this->viewdata);
    }
}
