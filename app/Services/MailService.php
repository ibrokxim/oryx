<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace App\Services;


use App\Mail\ContactShipped;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function send() {
        Mail::to('oryx.usa.kz@gmail.com')->send(new ContactShipped());
    }
}
