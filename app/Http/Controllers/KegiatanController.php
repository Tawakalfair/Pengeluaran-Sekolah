<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor.multiauth.kegiatan.index');
    }

    public function getdata()
    {
        $kegiatan = Kegiatan::all();
        return Datatables::of($kegiatan)
        ->addColumn('action', function ($kegiatan) {
               return '<form class="form-inline"  action="'.route('kegiatan.destroy',$kegiatan->id).'" method="POST" >
               '.csrf_field().'
               '. method_field('delete') .'
               <button class="btn btn-sm btn-danger mr-3" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
               <a href="'.route('kegiatan.edit',$kegiatan->id).'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
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
        return view('vendor.multiauth.kegiatan.create');
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
          'kode_kegiatan' =>  'required',
          'nama_kegiatan' =>  'required'
        ]);

        $kegiatan = new Kegiatan();
        $kegiatan->kode_kegiatan  = $request->get('kode_kegiatan');
        $kegiatan->nama_kegiatan  = $request->get('nama_kegiatan');
        $kegiatan->save();
        return redirect()->route('kegiatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('vendor.multiauth.kegiatan.edit',compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'kode_kegiatan' =>  'required',
        'nama_kegiatan' =>  'required'
      ]);

      $keg = Kegiatan::find($id);
      $keg->kode_kegiatan  = $request->get('kode_kegiatan');
      $keg->nama_kegiatan  = $request->get('nama_kegiatan');
      $keg->save();
      return redirect()->route('kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keg = Kegiatan::find($id);
        $keg->delete();
        return redirect()->route('kegiatan');
    }
}
