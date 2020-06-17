<?php

namespace App\Jobs;

use App\Coulomb;
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

        $data = Coulomb::getData();

        if ($data->mode >= 0)
        {
            $point = new Point();

            $point->mode = $data->mode;
        }
        else
            return;

        $point->session_id = $this->session_id;

        $point->status = $data->status;
        $point->v = $data->v;
        $point->a = $data->a;
        $point->ah = $data->ah;

        $point->datetime = Carbon::now();

        $point->save();
    }
}
