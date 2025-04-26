<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;

class MailController extends Controller
{
    public $mail;

    public function __construct(Mailable $mail)
    {
        $this->mail = $mail;
    }

    public function determineTarget(string $email)
    {
        return $email;
    }

    public function sendMail($data)
    {
        return Mail::mailer('smtp')->to($this->determineTarget($data['to']))->send($this->mail);
    }
}
