<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use App\Kegiatan;
use App\Profile;
use App\Belanja;
use App\Jenisbelanja;
use Yajra\Datatables\Datatables;
use Auth;
use Illuminate\Http\Request;

class SekolahPengeluaranController extends Controller
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
    public function index($id)
    {
      $idp=Auth::guard('sekolah')->user()->id;
      $profil=Profile::where('sekolah_id',$idp)->get();
      if ($profil->count() == 0) {
        $notification = array(
         'message' => 'Profil Harus Dibuat dahulu !',
         'alert-type' => 'warning'
);
      return  redirect()->route('sekolah.dashboard')->with($notification);
    }else {
      $keg=$id;

      return view('sekolah.pengeluaran.indexsek')->with('keg',$keg);
    }

    }


    public function getdatasekolah($id)
    {
         $p = Auth::guard('sekolah')->user()->id;
         $profil = Profile::where('sekolah_id',$p)->first();
         $idprofil = $profil->id ;
         $id1=$id;
        $pengeluaran = Pengeluaran::with('kegiatan')->
                                    with('profile')->
                                    with('belanja')->
                                    with('jenbel')->
                                    with('kegiatan')->select('pengeluarans.*')->where('profile_id',$idprofil)
                                    ->where('kegiatan_id',$id);
        return Datatables::of($pengeluaran)
        ->addColumn('action', function ($pengeluaran) use($id1) {
               return '<form class="form-inline"  action="'.route('pengeluaran.destroy',$pengeluaran->id).'" method="POST" >
               '.csrf_field().'
               '. method_field('delete') .'
               <button class="btn btn-sm btn-danger mr-3" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
               <a href="'.route('sekolah.pengeluaran.edit',['id' => $pengeluaran->id, 'id1' => $id1]).'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
               </form>';
           })
        ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $kegiatan      = Kegiatan::find($id);
      $profile       = Profile::all();
      $belanja       = Belanja::where('kegiatan_id',$id)->get();
      $jenbel        = Jenisbelanja::select('belanjas.*','jenisbelanjas.*')
                    ->join('belanjas','belanjas.id','=','jenisbelanjas.belanja_id')
                    ->where('kegiatan_id',$id)->get();

    return view('sekolah.pengeluaran.create',compact('kegiatan','profile','belanja','jenbel'));

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
        'pengeluaran' => 'required',
        'jenbel' => 'required',
        'belanja' => 'required',
        'tanggal' => 'required'
      ]);

      $pengeluaran  = new Pengeluaran();
      $pengeluaran->profile_id       = $request->get('sekolah');
      $pengeluaran->kegiatan_id  = $request->get('kegiatan');
      $pengeluaran->belanja_id  = $request->get('belanja');
      $pengeluaran->jenbel_id  = $request->get('jenbel');
      $pengeluaran->jum_peng  = $request->get('pengeluaran');
      $pengeluaran->tanggal  = $request->get('tanggal');
      $pengeluaran->save();

      return redirect()->route('sekolah.pengeluaran',$request->get('kegiatan'));
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
    public function edit($id,$id1)
    {
      $kegiatan      = Kegiatan::find($id1);
      $profile       = Profile::all();
      $belanja       = Belanja::where('kegiatan_id',$id1)->get();
      $jenbel        = Jenisbelanja::select('belanjas.*','jenisbelanjas.*')
                    ->join('belanjas','belanjas.id','=','jenisbelanjas.belanja_id')
                    ->where('kegiatan_id',$id1)->get();
      $pengeluaran   = Pengeluaran::find($id);
      return view('sekolah.pengeluaran.edit',compact('kegiatan','profile','belanja','jenbel','pengeluaran'));
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
        'pengeluaran' => 'required',
        'jenbel' => "required",
        'belanja' => "required",
        'tanggal' => "required|unique:pengeluarans,tanggal,$id,id,jenbel_id,".$request->get('jenbel')
      ]);

      $pengeluaran  = Pengeluaran::find($id);
      $pengeluaran->profile_id       = $request->get('sekolah');
      $pengeluaran->kegiatan_id  = $request->get('kegiatan');
      $pengeluaran->belanja_id  = $request->get('belanja');
      $pengeluaran->jenbel_id  = $request->get('jenbel');
      $pengeluaran->jum_peng  = $request->get('pengeluaran');
      $pengeluaran->tanggal  = $request->get('tanggal');
      $pengeluaran->save();

      return redirect()->route('sekolah.pengeluaran',$request->get('kegiatan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();
        return redirect()->back();
    }
}
