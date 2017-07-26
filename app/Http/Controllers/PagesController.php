<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Server;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index');
    }

    public function online()
    {
        $players = Server::playersOnline();

        return view('pages.online', compact('players'));
    }
}
