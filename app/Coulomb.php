<?php

namespace App;


class Coulomb {

    public static function getData()
    {
        $url = "http://" . env('COULOMB_IP') . "/data.jsn";

        $ctx = stream_context_create([
            'http' => ['timeout' => 2]
        ]);

        try
        {
            $data = json_decode(substr(str_replace("\r\n", '', file_get_contents($url, false, $ctx)), 3), true);
        }
        catch (\Exception $e)
        {
            return collect([
                'status' => 'Кулон не подключен',
                'mode' => -2,
                'v' => '--.--',
                'a' => '--.--',
                'ah' => '--.--'
            ]);
        }



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

        $va = explode('<br/>', $data['pda']);

        $v = preg_replace('/[^0-9\-\.]/', '', $va[0]) ?? 0;
        $a = strlen(preg_replace('/[^0-9\-\.]/', '', $va[1])) ? preg_replace('/[^0-9\-\.]/', '', $va[1]) : 0;

        $pnf = explode(' ', $data['pnf']);

        $ah = strlen($pnf[sizeof($pnf)-1]) ? preg_replace('/[^0-9\-\.]/', '', $pnf[sizeof($pnf)-1]) : 0;

        return collect([
            'status' => $data['prs'],
            'mode' => $mode,
            'v' => $v,
            'a' => $a,
            'ah' => $ah
        ]);
    }
}
