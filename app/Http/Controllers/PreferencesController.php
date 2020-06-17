<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreferencesController extends Controller
{

    /**
     * Save preferences
     *
     * @param Request $request
     *
     * @return string
     */
    public function save(Request $request)
    {
        $success = true;

        if ($request->has('ip'))
        {
            if ($request->input('ip') != env('COULOMB_IP'))
            {
                // Read .env-file
                $env = file_get_contents(base_path() . '/.env');

                $search = '/^COULOMB_IP=.*$/m';
                $replace = 'COULOMB_IP=' . $request->input('ip');
                $env = preg_replace($search, $replace, $env);

                // And overwrite the .env with the new data
                file_put_contents(base_path() . '/.env', $env);
            }
        }

        return $success ? 'success' : 'failed';
    }
}
