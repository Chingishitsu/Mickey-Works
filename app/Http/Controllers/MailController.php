<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function send()
    {
        $matchs = Match::all();
        if ($matchs == null){
            echo "no match";
            exit();
        }
        Mail::to('qq259487515@gmail.com')->send(new TestMail($matchs));
    }
}
