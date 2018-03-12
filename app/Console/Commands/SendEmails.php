<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Match;
use App\Mail\TestMail;
use App\Mail\NoMatch;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send matches email';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $today = date("Y-m-d");

        $matches = Match::where('updated_at','like',$today."%")->get();

        if (count($matches) == '0'){
            Mail::to('qq259487515@gmail.com')->send(new NoMatch());
        }else{
            Mail::to('qq259487515@gmail.com')->send(new TestMail($matches));
        }


        if(Mail::failures())
        {
            $this->error('Fail to send email ');exit;

        }

        $this->info('Success to send email');exit;

    }
}
