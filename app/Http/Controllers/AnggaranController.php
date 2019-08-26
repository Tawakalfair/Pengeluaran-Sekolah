<?php

namespace App\Http\Controllers;
use App\Profile;
use App\Jenisbelanja;
use App\Anggaran;
use App\Sekolah;
use App\Kegiatan;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class AnggaranController extends Controller
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
         return view('vendor.multiauth.anggaran.index');
     }
     public function getdata()
     {
       $anggaran = Anggaran::with('profile')->
                             with('jenbel')->
                             with('kegiatan')->select('anggarans.*');

         return Datatables::of($anggaran)
         ->addColumn('action', function ($anggaran) {
                return '<form class="form-inline"  action="'.route('anggaran.destroy',$anggaran->id).'" method="POST" >
                '.csrf_field().'
                '. method_field('delete') .'
                <button class="btn btn-sm btn-danger mr-3" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                <a href="'.route('anggaran.edit',$anggaran->id).'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                </form>';
            })
         ->make(true);
     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile  = Profile::all();
        $jenbel   = Jenisbelanja::all();
        $kegiatan = Kegiatan::all();
        if (count($profile) == 0) {

          $notification = array(
           'message' => 'Sekolah masih kosong !',
           'alert-type' => 'warning'
);
 return redirect()->route('anggaran')->with($notification);
}else{
  return view('vendor.multiauth.anggaran.create',compact('profile','jenbel','kegiatan'));
}

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
          'sekolah' => 'required',
          'jenbel' => 'required',
          'anggaran'=> 'required',
          'tahun'   => 'required',//'required|unique:anggarans,tahun,NULL,id,kegiatan_id,'.$request->get('kegiatan'),
          'kegiatan'=> 'required'
        ]);

        $anggaran = new Anggaran();
        $anggaran->profile_id   = $request->get('sekolah');
        $anggaran->jenbel_id    = $request->get('jenbel');
        $anggaran->jumlah_ang   = $request->get('anggaran');
        $anggaran->Tahun        = $request->get('tahun');
        $anggaran->kegiatan_id  = $request->get('kegiatan');

        $anggaran->save();
        return redirect()->route('anggaran');
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
        $anggaran = Anggaran::find($id);
        $profile  = Profile::all();
        $jenbel   = Jenisbelanja::all();
        $kegiatan = Kegiatan::all();
        return view('vendor.multiauth.anggaran.edit',compact('anggaran','profile','kegiatan','jenbel'));
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
        'sekolah' => 'required',
        'anggaran'=> 'required',
        'tahun'   => 'required',
        'kegiatan'=> 'required'
      ]);
        $anggaran = Anggaran::find($id);
        $anggaran->profile_id   = $request->get('sekolah');
        $anggaran->jumlah_ang   = $request->get('anggaran');
        $anggaran->Tahun        = $request->get('tahun');
        $anggaran->kegiatan_id  = $request->get('kegiatan');
        $anggaran->jenbel_id    = $request->get('jenbel');
        $anggaran->save();
        return redirect()->route('anggaran');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggaran = Anggaran::find($id);
        $anggaran->delete();

        return redirect()->route('anggaran');
    }
}
