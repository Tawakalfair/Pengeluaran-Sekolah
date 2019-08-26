<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/sekolah/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('sekolah.auth:sekolah');
    }

    /**
     * Show the Sekolah dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('sekolah.home');
    }

}