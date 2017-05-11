<?php

namespace App\Jobs;

use App\Model\MailPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     * @param String $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     * @param \Illuminate\Mail\Mailer $mailer
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $to = $this->data['mail'];
        $title = $this->data['title'];
        $mailer->send('mail.mail', ['content'=>$this->data['body']], function ($message) use($to,$title) {
            $message->to($to)->subject($title);
        });
    }
}
