<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(protected $request, protected $txt, protected $phone, protected $country)
    {
         $this->request = $request;
        $this->txt = $txt;
        $this->phone = $phone;
        $this->country = $country;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Inquiry Form',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.welcome',
            with: [
                'name' => $this->request['name'],
                'email' => $this->request['email'],
                'txt' => $this->txt,
                'phone' => $this->phone,
                'country' => $this->country
            ]
        );
    }
	public function build()
    {
        return $this->from('ofis@oryx.kz', 'Oryx Admin')
                    ->view('emails.welcome')
                    ->with([
                        'name' => $this->request['name'],
                        'email' => $this->request['email'],
                        'txt' => $this->txt,
                        'phone' => $this->phone,
                        'country' => $this->country,
                    ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}