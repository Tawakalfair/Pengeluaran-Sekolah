<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use App\Kegiatan;
use App\Profile;
use App\Belanja;
use App\Jenisbelanja;
use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         return view('vendor.multiauth.pengeluaran.index');
     }


     public function getdata()
     {
         $pengeluaran = Pengeluaran::with('kegiatan')->
                                     with('profile')->
                                     with('belanja')->
                                     with('jenbel')->
                                     with('kegiatan')->select('pengeluarans.*');
         return Datatables::of($pengeluaran)
         ->addColumn('action', function ($pengeluaran) {
                return '<form class="form-inline"  action="'.route('penge.destroy',$pengeluaran->id).'" method="POST" >
                '.csrf_field().'
                '. method_field('delete') .'
                <button class="btn btn-sm btn-danger mr-3" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                <a href="'.route('penge.edit',$pengeluaran->id).'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                </form>';
            })
         ->make(true);
     }

     public function create()
     {
         $kegiatan      = Kegiatan::all();
         $profile       = Profile::all();
         $belanja       = Belanja::all();
         $jenbel        = Jenisbelanja::all();
         if (count($kegiatan) == 0) {

           $notification = array(
	          'message' => 'Kegiatan masih kosong !',
	          'alert-type' => 'warning'
);
  return redirect()->route('pengeluaran')->with($notification);
}elseif(count($profile) == 0){
  $notification = array(
   'message' => 'Sekolah masih kosong !',
   'alert-type' => 'warning'
 );
 return redirect()->route('pengeluaran')->with($notification);
}elseif(count($belanja) == 0){
  $notification = array(
   'message' => 'Belanja masih kosong !',
   'alert-type' => 'warning'
 );
 return redirect()->route('pengeluaran')->with($notification);
}elseif(count($jenbel) == 0){
  $notification = array(
   'message' => 'Jenis Belanja masih kosong !',
   'alert-type' => 'warning'
 );
 return redirect()->route('pengeluaran')->with($notification);
}
else{
  return view('vendor.multiauth.pengeluaran.create',compact('kegiatan','subkegiatan','profile','belanja','jenbel'));
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
        'pengeluaran' => 'required',
        'jenbel' => 'required',
        'belanja' => 'required|unique:pengeluarans,belanja_id,NULL,id,kegiatan_id,'.$request->get('kegiatan'),
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

      return redirect()->route('pengeluaran');
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
      $kegiatan      = Kegiatan::all();
      $profile       = Profile::all();
      $belanja       = Belanja::all();
      $jenbel        = Jenisbelanja::all();
      $pengeluaran   = Pengeluaran::find($id);
      return view('vendor.multiauth.pengeluaran.edit',compact('kegiatan','subkegiatan','profile','belanja','jenbel','pengeluaran'));
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
        'jenbel' => "required|unique:pengeluarans,jenbel_id,$id,id,profile_id,".$request->get('sekolah'),
        'belanja' => "required|unique:pengeluarans,belanja_id,$id,id,jenbel_id,".$request->get('jenbel'),
        'tanggal' => 'required'
      ]);

      $pengeluaran  = Pengeluaran::find($id);
      $pengeluaran->profile_id       = $request->get('sekolah');
      $pengeluaran->kegiatan_id  = $request->get('kegiatan');
      $pengeluaran->belanja_id  = $request->get('belanja');
      $pengeluaran->jenbel_id  = $request->get('jenbel');
      $pengeluaran->jum_peng  = $request->get('pengeluaran');
      $pengeluaran->tanggal  = $request->get('tanggal');
      $pengeluaran->save();

      return redirect()->route('pengeluaran');
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
}
