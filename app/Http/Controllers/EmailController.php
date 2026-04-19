<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;

class EmailController extends Controller
{
    public function sendEmail() {
        $email="shazrachoudhury2015@gmail.com";
        SendEmailJob::dispatch($email);
            // dispatch(new SendEmailJob($email));
        return "Email job pushed to queue";
    }

}
