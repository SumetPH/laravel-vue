<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail; 
use Storage;

class TestController extends Controller
{
    public function sendMail()
    {
        Mail::to('xxx@gmail.com')->send(new TestMail('Hello Word!'));
        return 'Send the email already.';
    }
}
