<?php

namespace App\Jobs;

use App\Point;
use Carbon\Carbon;
use File;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class GetCoulombData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $session_id;

    /**
     * Create a new job instance.
     *
     * @param $session_id
     */
    public function __construct($session_id)
    {
        $this->session_id = $session_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (!File::exists(app()->storagePath().'/app/session'))
            return;

        $url = "http://" . env('COULOMB_IP') . "/data.jsn";
        $data = json_decode(substr(str_replace("\r\n", '', file_get_contents($url)), 3), true);

        $point = new Point();

        $point->session_id = $this->session_id;

        $point->status = $data['prs'];

        switch (substr($data['prs'], 0, stripos($data['prs'], '.')))
        {
            case 'АКБ подключена':
                $mode = 0;
                break;
            case 'Основной ЗАРЯД':
                $mode = 4;
                break;
            case 'Асимметричный ЗАРЯД':
                $mode = 3;
                break;
            case 'ДОЗАРЯД':
                $mode = 5;
                break;
            case 'Хранение АКБ':
                $mode = 6;
                break;
            case 'Разряд АКБ':
                $mode = 7;
                break;
            default:
                $mode = -1;
        }

        if ($mode >= 0)
        {
            $point->mode = $mode;
        }
        else
            return;

        $point->datetime = Carbon::now();

        $va = explode('<br/>', $data['pda']);

        $point->v = preg_replace('/[^0-9\-\.]/', '', $va[0]) ?? 0;
        $point->a = strlen(preg_replace('/[^0-9\-\.]/', '', $va[1])) ? preg_replace('/[^0-9\-\.]/', '', $va[1]) : 0;

        $pnf = explode(' ', $data['pnf']);


        $point->ah = strlen($pnf[sizeof($pnf)-1]) ? preg_replace('/[^0-9\-\.]/', '', $pnf[sizeof($pnf)-1]) : 0;

        $point->save();
    }
}
