<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailTrap;

class MailController extends Controller
{
    public function index() {
        Mail::to('alfangr05@gmail.com')->send(new MailTrap());
    }
}
