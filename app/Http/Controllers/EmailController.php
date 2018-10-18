<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailTrap;

class EmailController extends Controller
{
    public function index() {
        return view('e-mails.index');
    }

    public function send() {
        try{
            $mail = Mail::send(new MailTrap());

            echo 'e-Mail sent!';
        }catch(\Exception $error) {
            dd($error);
        }
    }
}
