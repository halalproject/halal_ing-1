<?php

namespace App\Console\Commands;

use App\Admin;
use App\Mail\LastLoginMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class LastLogin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:lastlogin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $rs = Admin::whereDate('last_login','<',now()->subMonth(3))->get();
        // dd($rs);

        foreach($rs as $rs){
            $tkh = $rs->last_login;
            $date1 = time();
            $y = substr($tkh,0,4);
            $m = substr($tkh,5,2);
            $d = substr($tkh,8,2);
            $date2 = mktime(0,0,0,$m,$d,$y);
            $dateDiff = abs($date2 - $date1);
            $fullDays = floor($dateDiff/(60*60*24));
            // dd($fullDays);
    
            $data = [
                'duration' => '('.$fullDays.') hari'
            ];
            Mail::to($rs->email)->send(new LastLoginMail($data));
        }
    }
}
