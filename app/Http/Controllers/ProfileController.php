<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     * Save profile
     * @param Request $request
     *
     * @return string
     */
    public function saveProfile(Request $request)
    {
        $success = false;

        if ($request->has('charge_profile_id'))
        {
            if (Profile::findOrFail($request->input('charge_profile_id'))->update(
                [
                    'ah' => $request->input('ah'),
                    'data' => $request->except('_token', 'charge_profile_id', 'type', 'title', 'ah')
                ]
            ))
                $success = true;
        }
        else
        {
            if (Profile::create([
                'type' => $request->input('type'),
                'title' => $request->input('title'),
                'ah' => $request->input('ah'),
                'data' => $request->except('_token', 'type', 'title', 'ah')
            ]))
                $success = true;
        }

        return $success ? 'success' : 'failed';
    }

    /**
     * Get profiles list by type (id => title)
     *
     * @param String $type
     *
     * @return mixed
     */
    public function getProfilesList(String $type)
    {
        return Profile::where('type', $type)->get()->pluck('title', 'id');
    }


    /**
     * Get specified profile data
     *
     * @param Profile $profile
     *
     * @return Profile
     */
    public function getProfile(Profile $profile)
    {
        return $profile;
    }

    /**
     * Delete specified profile
     *
     * @param Request $request
     *
     * @return string
     */
    public function deleteProfile(Request $request)
    {
        if (Profile::findOrFail($request->input('profile_id'))->delete())
            return 'success';
        else
            return 'failed';
    }

}
