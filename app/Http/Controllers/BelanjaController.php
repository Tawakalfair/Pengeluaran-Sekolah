<?php

namespace App\Http\Controllers;

use App\Belanja;
use App\Kegiatan;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class BelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor.multiauth.belanja.index');
    }

    public function getdata()
    {
      $belanja  = Belanja::with('kegiatan')->select('belanjas.*');
      return Datatables::of($belanja)
      ->addColumn('action', function ($belanja) {
             return '<form class="form-inline"  action="'.route('belanja.destroy',$belanja->id).'" method="POST" >
             '.csrf_field().'
             '. method_field('delete') .'
             <button class="btn btn-sm btn-danger mr-3" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
             <a href="'.route('belanja.edit',$belanja->id).'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
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
        $kegiatan = Kegiatan::all();
        return view('vendor.multiauth.belanja.create',compact('kegiatan'));
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
        'kode_belanja' => 'required|unique:belanjas,kode_belanja,NULL,id,kegiatan_id,'.$request->get('kegiatan'),
        'nama_belanja' => 'required|max:255',
        'kegiatan'     => 'required'
      ]);

      $belanja  = new Belanja();
      $belanja->kode_belanja  = $request->get('kode_belanja');
      $belanja->nama_belanja  = $request->get('nama_belanja');
      $belanja->kegiatan_id   = $request->get('kegiatan');
      $belanja->save();

      return redirect()->route('belanja');
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
        $belanja   =  Belanja::find($id);
        $kegiatan = Kegiatan::all();
        return view('vendor.multiauth.belanja.edit',compact('belanja','kegiatan'));
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
        'kode_belanja' => "required|unique:belanjas,kode_belanja,$id,id,kegiatan_id,".$request->get('kegiatan'),
        'nama_belanja' => 'required|max:255',
        'kegiatan'     => 'required'
      ]);

      $belanja  = Belanja::find($id);
      $belanja->kode_belanja  = $request->get('kode_belanja');
      $belanja->nama_belanja  = $request->get('nama_belanja');
      $belanja->kegiatan_id   = $request->get('kegiatan');
      $belanja->save();

      return redirect()->route('belanja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $belanja  = Belanja::find($id);
        $belanja->delete();
        return redirect()->route('belanja');
    }
}
