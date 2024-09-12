<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Mail\ContactShipped;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function test(Request $request): RedirectResponse
    {
        // Ship the order...

        Mail::to('oryx.usa.kz@gmail.com')->send(new ContactShipped());

        return redirect('/');
    }

    public function send(Request $request, $domain = 'ae')
    {
        $validated = $request->validate(['name' => ['required'], 'email' => ['required']]);
        $message = Arr::get($request, 'message', 'no message');
        $phone = Arr::get($request, 'phone', 'no phone');
        $country = 'KZ';
        Mail::to('oryx.usa.kz@gmail.com')->send(new ContactShipped($validated, $message, $phone, $country));

        return redirect()->back()->with('status', 'success');
    }
}
