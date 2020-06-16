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
            if (Profile::update(
                ['profile_id' => $request->input('profile_id')],
                [
                    'type' => $request->input('type'),
                    'title' => $request->input('title'),
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

    public function getProfilesList(String $type)
    {
        return Profile::charge()->get()->pluck('title', 'id');
    }

    public function getProfile(Profile $profile)
    {
        return $profile;
    }

}
