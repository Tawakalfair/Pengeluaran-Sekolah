<?php

namespace App\Http\Controllers;

use App\Jenisbelanja;
use App\Belanja;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class JenisbelanjaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
       return view('vendor.multiauth.jenbel.index');
   }

   public function getdata()
   {
       $jenbel = Jenisbelanja::with('belanja')->select('jenisbelanjas.*');
       return Datatables::of($jenbel)
       ->addColumn('action', function ($jenbel) {
              return '<form class="form-inline"  action="'.route('jenisbelanja.destroy',$jenbel->id).'" method="POST" >
              '.csrf_field().'
              '. method_field('delete') .'
              <button class="btn btn-sm btn-danger mr-3" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
              <a href="'.route('jenisbelanja.edit',$jenbel->id).'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
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
      $belanja = Belanja::all();
      if (count($belanja) == 0) {

        $notification = array(
         'message' => 'Belanja masih kosong !',
         'alert-type' => 'warning'
);
return redirect()->route('jenisbelanja')->with($notification);
}else {
      return view('vendor.multiauth.jenbel.create',compact('belanja'));
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
      'kode_jenbel' => 'required|unique:jenisbelanjas,kode_jenbel,NULL,id,belanja_id,'.$request->get('belanja'),
      'nama_jenbel' => 'required|max:255'
    ]);

    $jenisbelanja  = new Jenisbelanja();
    $jenisbelanja->belanja_id  = $request->get('belanja');
    $jenisbelanja->kode_jenbel  = $request->get('kode_jenbel');
    $jenisbelanja->nama_jenbel  = $request->get('nama_jenbel');
    $jenisbelanja->save();

    return redirect()->route('jenisbelanja');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $belanja = Belanja::all();
    $jenisbelanja      =  Jenisbelanja::find($id);
    return view('vendor.multiauth.jenbel.edit',compact('belanja','jenisbelanja'));
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
      'kode_jenbel' => "required|unique:jenisbelanjas,kode_jenbel,$id,id,belanja_id,".$request->get('belanja'),
      'nama_jenbel' => 'required|max:255'
    ]);

    $jenisbelanja  =  Jenisbelanja::find($id);
    $jenisbelanja->belanja_id  = $request->get('belanja');
    $jenisbelanja->kode_jenbel  = $request->get('kode_jenbel');
    $jenisbelanja->nama_jenbel  = $request->get('nama_jenbel');
    $jenisbelanja->save();

    return redirect()->route('jenisbelanja');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $jenisbelanja  = Jenisbelanja::find($id);
      $jenisbelanja->delete();
      return redirect()->route('jenisbelanja');
  }
}
