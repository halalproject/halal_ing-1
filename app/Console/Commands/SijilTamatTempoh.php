<?php

namespace App\Console\Commands;

use App\Client;
use App\Mail\TamatTempohMail;
use App\Ramuan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SijilTamatTempoh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:tamattempoh';

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
        $syarikat = Client::where('status',0)->where('is_delete',0)->get();

        foreach($syarikat as $syarikat){
            $rstm = Ramuan::where('create_by',$syarikat->userid)->where('status',3)->where('is_delete',0)->whereBetween('tarikh_tamat_sijil',[now()->addDays(30),now()->addDays(90)])->get();
            $rsom = Ramuan::where('create_by',$syarikat->userid)->where('status',3)->where('is_delete',0)->whereBetween('tarikh_tamat_sijil',[now()->addDays(7),now()->addDays(30)])->get();
            $rsod = Ramuan::where('create_by',$syarikat->userid)->where('status',3)->where('is_delete',0)->where('tarikh_tamat_sijil','<=',now()->addDays(7))->get();
            
            if(!$rstm->isEmpty() || !$rsom->isEmpty() || !$rsod->isEmpty()){
                $data = [
                    'three_month' =>$rstm->count(),
                    'one_month' => $rsom->count(),
                    'one_week' => $rsod->count()
                ];
                Mail::to($syarikat->company_email)->send(new TamatTempohMail($data));
            }
        }

    }
}
