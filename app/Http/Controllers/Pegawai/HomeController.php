<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/pegawai/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('pegawai.auth:pegawai');
    }

    /**
     * Show the Pegawai dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('pegawai.home');
    }

}