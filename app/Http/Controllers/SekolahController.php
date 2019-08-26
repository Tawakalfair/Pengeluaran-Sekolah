<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;
use App\Profile;

class SekolahController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:admin');
    $this->middleware('role:super');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function list()
    {
      $sekolah = Sekolah::paginate(5);

      return view('sekolah.admin.list',compact('sekolah'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekolah.admin.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:sekolahs',
          'password' => 'required|min:6|confirmed',
      ]);

      $sekolah = new Sekolah ([
        'name'     => $request->get('name'),
        'email'    => $request->get('email'),
        'password' => bcrypt($request->get('password'))
        ]);
        $sekolah->save();
         return redirect()->route('admin.sekolah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sekolah = Sekolah::find($id);

        return view('sekolah.admin.edit',compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:sekolahs',
        'password' => 'required|min:6|confirmed',
    ]);

    $sekolah = Sekolah::find($id);
      $sekolah->name    = $request->get('name');
      $sekolah->email    = $request->get('email');
      $sekolah->password = bcrypt($request->get('password'));

      $sekolah->save();
       return redirect()->route('admin.sekolah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $sekolah = Sekolah::find($id);
    $sekolah->delete();
    return redirect()->route('admin.sekolah');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    
}
