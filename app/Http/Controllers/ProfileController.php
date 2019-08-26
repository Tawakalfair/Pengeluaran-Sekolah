<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Profile;
use App\Sekolah;
use Auth;

class ProfileController extends Controller
{

    public function __construct()
    {
      $this->middleware('sekolah.auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    /*  $id = Auth::guard('sekolah')->user()->id;
      $profil = Profile::where('sekolah_id',$id)->first();

      return $profil->id; */

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


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
        'nama_sekolah' => 'required|max:255',
        'no_telp'      => 'required|max:30',
        'alamat'       => 'required',
        'foto'         => 'file|max:1000'
      ]);

      $profil = new Profile();
      $profil->sekolah_id   = $request->get('sekolah_id');
      $profil->nama_sekolah = $request->get('nama_sekolah');
      $profil->no_telp      = $request->get('no_telp');
      $profil->alamat       = $request->get('alamat');

      $id = $request->get('sekolah_id');
      if ($request->hasfile('foto')) {

        $file       = $request->file('foto');
        $extension  = $file->getClientOriginalExtension();
        $filename   = time() .'.'. $extension;
        $file->move('uploads/profil/',$filename);
        $profil->foto = $filename;
      }else {
        return $request;
        $profil->foto = '';
      }

      $profil->save();
      $profil = Profile::where('sekolah_id',$id)->get();
      return redirect("sekolah/profil/$id"); // view('sekolah.profil.show',compact('profil'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $profil = Profile::where('sekolah_id',$id)->get();
      if (Auth::guard('sekolah')->user()->id == $id) {
      return view('sekolah.profil.show',compact('profil'));
      }

      else {
        return redirect()->route('sekolah.dashboard');
      }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profil= Profile::where('sekolah_id',$id)->first();
        $cekprof= Profile::where('sekolah_id',$id)->get();
          if (Auth::guard('sekolah')->user()->id == $id) {
          return view('sekolah.profil.edit',compact('profil','cekprof'));
      }
      else {
        return redirect()->route('sekolah.dashboard');
      }
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
      $photo = Profile::where('sekolah_id',$id)->first();
      $usersImage = public_path("uploads/profil/{$photo->foto}");
      unlink($usersImage);
      $request->validate([
        'nama_sekolah' => 'required|max:255',
        'no_telp'      => 'required|max:30',
        'alamat'       => 'required',
        'foto'         => 'file|max:1000'
      ]);

      $profil = Profile::where('sekolah_id',$id)->first();
      $profil->sekolah_id   = $request->input('sekolah_id');
      $profil->nama_sekolah = $request->input('nama_sekolah');
      $profil->no_telp      = $request->input('no_telp');
      $profil->alamat       = $request->input('alamat');

      if ($request->hasfile('foto')) {

        $file       = $request->file('foto');
        $extension  = $file->getClientOriginalExtension();
        $filename   = time() .'.'. $extension;
        $file->move('uploads/profil/',$filename);
        $profil->foto = $filename;
      }else {
        return $request;
        $profil->foto = '';
      }

      $profil->save();

      return redirect()->route('sekolah.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function guard()
    {
        return Auth::guard('sekolah');
    }
    public function showChangePasswordForm()
    {
        return view('sekolah.change');
    }

    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'oldPassword'   => 'required',
            'password'      => 'required|confirmed'
        ]);
        Auth::guard('sekolah')->user()->update(['password' => bcrypt($data['password'])]);
        return redirect(route('sekolah.dashboard'))->with('message', 'Your password is changed successfully');
    }
}
