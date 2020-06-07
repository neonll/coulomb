<?php

namespace App\Http\Controllers;

use App\Session;
use File;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sessions = Session::get();

        return view('sessions.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        if (Session::create($request->except('_token')))
            return redirect('sessions')->with('flash', ['success', 'Сессия добавлена']);
        else
        {
            throw new \Exception('Session: Не удалось добавить сессию!');
            return redirect('sessions')->with('flash', ['danger', 'Не удалось добавить сессию!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Session  $session
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Session $session)
    {
        return view('sessions.show', compact('session'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Session  $session
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Session $session)
    {
        return view('sessions.edit', compact('session'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Session             $session
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Request $request, Session $session)
    {
        if ($session->update($request->except('_token', '_method')))
            return redirect('sessions')->with('flash', ['success', 'Сессия изменена']);
        else
        {
            throw new \Exception('Session: Не удалось изменить сессию!');
            return redirect('sessions')->with('flash', ['danger', 'Не удалось изменить сессию!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Session $session
     *
     * @return string
     * @throws \Exception
     */
    public function destroy(Session $session)
    {
        if ($session->delete())
            return 'success';
        else
        {
            return 'error';
        }
    }

    /**
     * Checks if /storage/app/session file exists
     *
     * @return int
     */
    public function checkFile()
    {
        if (File::exists(app()->storagePath().'/app/session'))
            return 1;
        else
            return 0;
    }

    /**
     * Deletes /storage/app/session file
     *
     * @param Request $request
     *
     * @return int
     */
    public function deleteFile(Request $request)
    {
        if (File::delete(app()->storagePath().'/app/session'))
            return 1;
        else
            return 0;
    }

    /**
     * Puts session_id to /storage/app/session file
     *
     * @param Request $request
     *
     * @return int
     */
    public function putFile(Request $request)
    {
        if ($request->has('session_id'))
        {
            if (File::put(app()->storagePath().'/app/session', $request->input('session_id')))
                return 1;
            else
                return 0;
        }
        else
            return 0;
    }
}
