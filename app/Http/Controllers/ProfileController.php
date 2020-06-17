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

        if ($request->has('profile_id'))
        {
            if (Profile::findOrFail($request->input('profile_id'))->update(
                [
                    'data' => $request->except('_token', 'profile_id', 'type', 'title')
                ]
            ))
                $success = true;
        }
        else
        {
            if (Profile::create([
                'type' => $request->input('type'),
                'title' => $request->input('title'),
                'data' => $request->except('_token', 'type', 'title')
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

}
