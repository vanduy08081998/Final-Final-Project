<?php

namespace App\Http\Controllers\Customer;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function Mail()
    {
        $detail = [
            'title' => 'tiêu đề',
            'body' => 'nội dung'
        ];
        Mail::to('nkokkenpro1995@gmail.com')->send(new SendMail($detail));

    }
}
