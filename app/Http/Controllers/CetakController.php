<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use App\Kegiatan;
use App\Profile;
use App\Belanja;
use App\Jenisbelanja;
use App\Anggaran;
use Excel;
use Carbon\Carbon;
use DateTime;
use Auth;
use Illuminate\Http\Request;

class CetakController extends Controller
{

  public function __construct()
  {
    $this->middleware('sekolah.auth');

  }

    public function cetakpengeluaran()
    {
      $idp=Auth::guard('sekolah')->user()->id;
      $profil=Profile::where('sekolah_id',$idp)->get();

      $id = Auth::guard('sekolah')->user()->id;
      $profile= Profile::where('sekolah_id',$id)->first();
      $kegiatan = Kegiatan::all();
      if (empty($profile)) {
        $notification = array(
         'message' => 'Profil Harus Dibuat dahulu !',
         'alert-type' => 'warning'
);
      return  redirect()->route('sekolah.dashboard')->with($notification);
    }else {
      return view('sekolah.pengeluaran.cetak',compact('kegiatan','profile'));
    }


    }



    public function cetak(Request $request)
    {
      $tahun=$request->tahun;
      $bulan=$request->bulan;
      $sekolah=$request->sekolah;
      $id_keg=$request->kegiatan;

      Excel::create('Filename', function($excel) use($tahun,$sekolah,$id_keg,$bulan) {
        $excel->sheet('Sheetname', function($sheet) use($tahun,$sekolah,$id_keg,$bulan) {


          $sheet->mergeCells('A1:W1');
          $sheet->mergeCells('A2:W2');
          $sheet->mergeCells('A3:W3');
          $sheet->cells('A1:W3', function($cells) {
            $cells->setFontWeight('bold');
            $cells->setAlignment('center');
    });
    $sheet->cells('A11:W14',function($cell){
      $cell->setBorder('thin','thin','thin','thin');
      $cell->setAlignment('center');
    });
    $sheet->setWidth(array(
  'A'     =>  15,
  'B'     =>  2.5,
  'C'     =>  2.5,
  'D'     =>  2.5,
  'E'     =>  2.5,
  'F'     =>  15,
  'G'     =>  2.5,
  'H'     =>  2.5,
  'I'     =>  2.5,
  'J'     =>  10,
  'K'     =>  55,
  'L'     => 20,
  'M'     => 20,
  'N'     => 20,
  'O'     => 20,
  'P'     => 20,
  'V'     =>15,
  'W'     =>15,
));
$sheet->cells('A1:A3',function($cells){
  $cells->setAlignment('center');
  $cells->setFontWeight('bold');
});
$sheet->cells('A37:W37',function($cells){
  $cells->setFontWeight('bold');
});
$sheet->cells('A11:W14',function($cell){
  $cell->setBorder('thin','thin','thin','thin');
  $cell->setAlignment('center');
});
$sheet->cells('A15:W15',function($cell){
  $cell->setBorder('thin','thin','thin','thin');
  $cell->setAlignment('center');
});
$sheet->cells('A16:W27',function($cell){
  $cell->setBorder('thin','thin','thin','thin');
});
$sheet->cells('A28:W28',function($cell){
  $cell->setBorder('thin','thin','thin','thin');
});
$sheet->cells('E11:E28',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('E12',function($cell){
  $cell->setBorder('none','thin','none','none');
});
$sheet->cells('F15',function($cell){
  $cell->setBorder('thin','thin','none','none');
});
$sheet->cells('F12:F13',function($cell){
  $cell->setBorder('none','thin','none','none');
});
$sheet->cells('J11:J28',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('K11:K28',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('L11:L28',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('M12:M28',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('M11',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('P11',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('S11',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('N12:N28',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('O12:O28',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('P12:P28',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('Q12:Q28',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('R12:R28',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('S12:S28',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('T12:T28',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('U11:U28',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('V11:V28',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
$sheet->cells('W11:W28',function($cell){
  $cell->setBorder('thin','thin','thin','none');
});
    $se= Profile::find($sekolah);
    $monthNum  = $bulan;
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
    $monthName = $dateObj->format('F'); // March
    $sheet->cell('A1','PEMERINTAH KABUPATEN SEMARANG');
    $sheet->cell('A2','LAPORAN PERTANGGUNGJAWABAN BENDAHARA PENGELUARAN');
    $sheet->cell('A3','(SURAT PERTANGGUNGJAWABAN BELANJA - FUNGSIONAL )');
    $sheet->cell('A4','PERANGKAT DEARAH ');
    $sheet->cell('K4',': DINAS PENDIDIKAN KEBUDAYAAN KEPEMUDAAN DAN OLAHRAGA');
    $sheet->cell('A5','PENGGUNA ANGGARAN ');
    $sheet->cell('K5',':'.$se->nama_sekolah);
    $sheet->cell('A6','BENDAHARA PENGELUARAN ');
    $sheet->cell('K6',':');
    $sheet->cell('A7','PPTK');
    $sheet->cell('K7',": ");
    $sheet->cell('A8','TAHUN ANGGARAN');
    $sheet->cell('K8',": $tahun");
    $sheet->cell('A9','BULAN ');
    $sheet->cell('K9',":$monthName");
    $sheet->cell('A10','NO. PENGESAHAN FUNGSIONAL');
    $sheet->cell('K10',':');
    $sheet->cell('A12','PROGRAM/');
    $sheet->cell('A13','KEGIATAN');
    $sheet->cell('A15','1');
    $sheet->cell('F12','KODE');
    $sheet->cell('F13','REKENING');
    $sheet->cell('F15','2');
    $sheet->cell('K12','URAIAN KEGIATAN/');
    $sheet->cell('K13','URAIAN BELANJA');
    $sheet->cell('K15','3');
    $sheet->cell('L12','JUMLAH');
    $sheet->cell('L13','ANGGARAN');
    $sheet->cell('L15','4');
    $sheet->cell('M11','SPJ - GU (GANTI UANG)');
    $sheet->cell('M12','s.d');
    $sheet->cell('M13','Bulan');
    $sheet->cell('M14','lalu');
    $sheet->cell('M15','5');
    $sheet->cell('N12','Bulan');
    $sheet->cell('N13','ini');
    $sheet->cell('N15','6');
    $sheet->cell('O12','s.d');
    $sheet->cell('O13','bulan');
    $sheet->cell('O14','ini');
    $sheet->cell('O15','7=(5+6)');
    $sheet->cell('P11','SPJ - TU (TAMBAH UANG)');
    $sheet->cell('P12','s.d');
    $sheet->cell('P13','bulan');
    $sheet->cell('P14','lalu');
    $sheet->cell('P15','8');
    $sheet->cell('Q12','Bulan');
    $sheet->cell('Q13','ini');
    $sheet->cell('Q15','9');
    $sheet->cell('R12','s.d');
    $sheet->cell('R13','bulan');
    $sheet->cell('R14','ini');
    $sheet->cell('R15','10=(8+9)');
    $sheet->cell('S11','SPJ - LS (BARANG & JASA');
    $sheet->cell('S12','s.d');
    $sheet->cell('S13','Bulan');
    $sheet->cell('S14','lalu');
    $sheet->cell('S15','11');
    $sheet->cell('T12','Bulan');
    $sheet->cell('T13','ini');
    $sheet->cell('T15','12');
    $sheet->cell('U12','s.d');
    $sheet->cell('U13','Bulan');
    $sheet->cell('U14','ini');
    $sheet->cell('U15','13=(11+12)');
    $sheet->cell('V11','Jumlah');
    $sheet->cell('V12','UP/TU/GU');
    $sheet->cell('V13','s.d');
    $sheet->cell('V14','Bulan ini');
    $sheet->cell('V15','14=(7+10+13)');
    $sheet->cell('W12','Sisa Pagu');
    $sheet->cell('W13','Anggaran');
    $sheet->cell('W15','15=(4-14)');
    $sheet->cell('K17','BELANJA LANGSUNG');
    $sheet->cell('K19','Jumlah SPM / SP 2 D');
    $sheet->cell('K21','Potongan Pajak :');
    $sheet->cell('K22','a. PPN');
    $sheet->cell('K23','b. PPh Pasal 21');
    $sheet->cell('K24','c. PPh Pasal 22');
    $sheet->cell('K25','d. PPh Pasal 23');
    $sheet->cell('K26','e. Lain-lain');
    $sheet->cell('K28','JUMLAH PENERIMAAN');
    $sheet->cell('K30','PENGELUARAN :');
    $sheet->cell('A32','');
    $sheet->cell('K32','');
    $sheet->cells('A32:W36',function($cell){
      $cell->setFontColor('#f44242');
      $cell->setFontWeight('bold');
    });
    $ke=Kegiatan::find($id_keg);
    $sheet->cell('B36','');
    $sheet->cell('A36',$ke->kode_kegiatan);
    $sheet->cell('K36',$ke->nama_kegiatan);
    $sheet->cell('K35','');
    $sheet->cell('K37','BELANJA BARANG DAN JASA ');
    $sheet->cell('J37','5.2.2 ');
    $sheet->getColumnDimension('K')->setAutoSize(true) ;
    $a=39;
    $b=38;
    $c=1;
    $d=1;
    $e=1;
    $h=37;
    $text = '';
    $text1 = '';
    $text2 = '';
    $text3 = '';
    $text4 = '';
    $text5 = '';
    $text6 = '';
    $start = 38;
    $i = $start;
/*$pengeluaran = Pengeluaran::select('*')->where('profile_id',$sekolah)->where('kegiatan_id',$id_keg)
              ->whereRaw('MONTH(tanggal)',$bulan)->whereRaw('year(tanggal)',$tahun)
              ->orderBy('belanja_id','asc')->orderBy('jenbel_id')->get();*/
$belanja = Belanja::where('kegiatan_id',$id_keg)->orderBy('kode_belanja')->get();
/*while ($c <= count($belanja)) {
  $jenbel[$c]  = Jenisbelanja::select('belanjas.kode_belanja','jenisbelanjas.*')
                ->join('belanjas','belanjas.id','=','jenisbelanjas.belanja_id')
                ->where('belanja_id',$c)->orderBy('kode_belanja')->get();
  $c++;
}*/

 foreach ($belanja as $bel) {
   $jenbel[$bel->id]  = Jenisbelanja::select('belanjas.kode_belanja','jenisbelanjas.*')
                 ->join('belanjas','belanjas.id','=','jenisbelanjas.belanja_id')
                 ->where('belanja_id',$bel->id)->orderBy('kode_belanja')->get();
   $g=$b;
   $f=$b+1;
   $g=$b+count($jenbel[$bel->id]);
  $sheet->cell('K'.$b,$bel->nama_belanja);
  $sheet->cell('J'.$b,$bel->kode_belanja);
  $sheet->cells('A'.$b.':W'.$b,function($cell){
    $cell->setFontWeight('bold');
  });
  $sheet->cell('L'.$b,'=SUM(L'.$f.':L'.$g.')');
  $sheet->cell('M'.$b,'=SUM(M'.$f.':M'.$g.')');
  $sheet->cell('N'.$b,'=SUM(N'.$f.':N'.$g.')');
  $sheet->cell('O'.$b,'=SUM(O'.$f.':O'.$g.')');
  $sheet->cell('P'.$b,'=SUM(P'.$f.':P'.$g.')');
  $sheet->cell('Q'.$b,'=SUM(Q'.$f.':Q'.$g.')');
  $sheet->cell('R'.$b,'=SUM(R'.$f.':R'.$g.')');
  $sheet->cell('S'.$b,'=SUM(S'.$f.':S'.$g.')');
  $sheet->cell('T'.$b,'=SUM(T'.$f.':T'.$g.')');
  $sheet->cell('U'.$b,'=SUM(U'.$f.':U'.$g.')');
  $sheet->cell('V'.$b,'=SUM(V'.$f.':V'.$g.')');
  $sheet->cell('W'.$b,'=SUM(W'.$f.':W'.$g.')');
  $b=$b+2+count($jenbel[$bel->id]);
  $text .= $i==$start ? $i : '+L' . $i;
  $text1 .= $i==$start ? $i : '+M' . $i;
  $text2 .= $i==$start ? $i : '+N' . $i;
  $text3 .= $i==$start ? $i : '+V' . $i;
  $text4 .= $i==$start ? $i : '+O' . $i;
  $text5 .= $i==$start ? $i : '+W' . $i;
  $i=$i+count($jenbel[$bel->id])+1;
  foreach ($jenbel[$bel->id] as $jen) {
    $bl=1;
    $bln=$bulan-1;

  $dateS = 1;
$dateE = $bulan-1;
    $pengeluaran = Pengeluaran::where('profile_id',$sekolah)->where('kegiatan_id',$id_keg)
                   ->where('jenbel_id',$jen->id)->whereYear('tanggal','=',$tahun)->whereMonth('tanggal','=',$bulan)->get();
    $pengbln = Pengeluaran::where('profile_id',$sekolah)->where('kegiatan_id',$id_keg)
                   ->where('jenbel_id',$jen->id)->whereYear('tanggal','=',$tahun)->whereMonth('tanggal','=',$bln)->get();
    $pengbln1 = Pengeluaran::where('profile_id',$sekolah)->where('kegiatan_id',$id_keg)
               ->where('jenbel_id',$jen->id)->whereYear('tanggal','=',$tahun)->whereRaw("month(tanggal) between $dateS and $dateE  ")->sum('jum_peng');
    $anggaran    = Anggaran::where('profile_id',$sekolah)->where('kegiatan_id',$id_keg)
                    ->where('jenbel_id',$jen->id)->where('tahun',$tahun)->get();
    $sheet->cell('J'.$a,$jen->kode_jenbel);
    $sheet->cell('K'.$a,$jen->nama_jenbel);
    $sheet->cell('O'.$a,'=SUM(M'.$a.':N'.$a.')');
    $sheet->cell('V'.$a,'=SUM(O'.$a.':N'.$a.':U'.$a.')');
    $sheet->cell('W'.$a,'=SUM(L'.$a.'-V'.$a.')');

    foreach ($pengeluaran as $peng) {
      $sheet->cell('N'.$a,$peng->jum_peng);

    }
   //foreach ($pengbln as $bln) {
    //  $sheet->cell('M'.$a,$bln->jum_peng);

  //  }
    $sheet->cell('M'.$a,$pengbln1);
    foreach ($anggaran as $ang) {
      $sheet->cell('L'.$a,$ang->jumlah_ang);

    }
    $a++;
  }
  $a=$a+2;
  $i++;
}
//$sheet->cell('K38',$jenbel[3]);
    //batas
    $sheet->cell('L37','=L'.$text.'');
    $sheet->cell('M37','=M'.$text1.'');
    $sheet->cell('N37','=N'.$text2.'');
    $sheet->cell('V37','=V'.$text3.'');
    $sheet->cell('O37','=O'.$text4.'');
    $sheet->cell('W37','=W'.$text5.'');


    $sheet->cells('E29:E'.$a,function($cell){
      $cell->setBorder('none','thin','none','none');
    });
    $sheet->cells('J29:J'.$a,function($cell){
      $cell->setBorder('none','thin','none','none');
    });
    $sheet->cells('K29:K'.$a,function($cell){
      $cell->setBorder('none','thin','none','none');
    });
    $sheet->cells('L29:L'.$a,function($cell){
      $cell->setBorder('none','thin','none','none');
    });
    $sheet->cells('M29:M'.$a,function($cell){
      $cell->setBorder('none','thin','none','none');
    });
    $sheet->cells('N29:N'.$a,function($cell){
      $cell->setBorder('none','thin','none','none');
    });
    $sheet->cells('O29:O'.$a,function($cell){
      $cell->setBorder('none','thin','none','none');
    });
    $sheet->cells('P29:P'.$a,function($cell){
      $cell->setBorder('none','thin','none','none');
    });
    $sheet->cells('Q29:Q'.$a,function($cell){
      $cell->setBorder('none','thin','none','none');
    });
    $sheet->cells('R29:R'.$a,function($cell){
      $cell->setBorder('none','thin','none','none');
    });
    $sheet->cells('S29:S'.$a,function($cell){
      $cell->setBorder('none','thin','none','none');
    });
    $sheet->cells('T29:T'.$a,function($cell){
      $cell->setBorder('none','thin','none','none');
    });
    $sheet->cells('U29:U'.$a,function($cell){
      $cell->setBorder('none','thin','none','none');
    });
    $sheet->cells('V29:V'.$a,function($cell){
      $cell->setBorder('none','thin','none','none');
    });
    $sheet->cells('W29:W'.$a,function($cell){
      $cell->setBorder('none','thin','none','none');
    });
    $sheet->cells('A'.$a.':W'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','thin');
      $cell->setAlignment('center');
    });
    $sheet->cell('K'.$a,'JUMLAH');
    $ax=$a;
    $sheet->cell('L'.$a,'=L37');
    $sheet->cell('M'.$a,'=M37');
    $sheet->cell('N'.$a,'=N37');
    $sheet->cell('O'.$a,'=O37');
    $sheet->cell('P'.$a,'=P37');
    $sheet->cell('Q'.$a,'=Q37');
    $sheet->cell('R'.$a,'=R37');
    $sheet->cell('S'.$a,'=S37');
    $sheet->cell('T'.$a,'=T37');
    $sheet->cell('U'.$a,'=U37');
    $sheet->cell('V'.$a,'=V37');
    $sheet->cell('W'.$a,'=W37');
    $a++;
    $sheet->cell('K'.$a,'Pengeluaran');
    $a++;
    $sheet->cell('K'.$a,'SP2D');
    $a++;
    $sheet->cell('K'.$a,'Potongan Pajak :');
    $a++;
    $sheet->cell('K'.$a,'a. PPN');
    $a++;
    $sheet->cell('K'.$a,'b. PPh Pasal 21');
    $a++;
    $sheet->cell('K'.$a,'c. PPh Pasal 22');
    $a++;
    $sheet->cell('K'.$a,'d. PPh Pasal 23');
    $a++;
    $sheet->cell('K'.$a,'e. Lain-lain');
    $a++;
    $a++;
    $sheet->cell('K'.$a,'JUMLAH PENGELUARAN');
    $sheet->cell('M'.$a,'=M'.$ax);
    $sheet->cell('N'.$a,'=N'.$ax);
    $sheet->cell('O'.$a,'=O'.$ax);
    $sheet->cell('P'.$a,'=P'.$ax);
    $sheet->cell('Q'.$a,'=Q'.$ax);
    $sheet->cell('R'.$a,'=R'.$ax);
    $sheet->cell('S'.$a,'=S'.$ax);
    $sheet->cell('T'.$a,'=T'.$ax);
    $sheet->cell('U'.$a,'=U'.$ax);
    $sheet->cell('V'.$a,'=V'.$ax);
    $sheet->cell('W'.$a,'=W'.$ax);
    $sheet->cells('A'.$a.':W'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','thin');
    });
    $a++;
    $a++;
    $sheet->cell('K'.$a,'SALDO KAS ');
    $sheet->setColumnFormat(array(
    'A37:W'.$a => '#,##0.00_-'
    ));
    $sheet->cells('A'.$a.':W'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','thin');
    });
    $sheet->cells('E11:E'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','none');
    });
    $sheet->cells('J11:J'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','none');
    });
    $sheet->cells('K11:K'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','none');
    });
    $sheet->cells('L11:L'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','none');
    });
    $sheet->cells('M12:M'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','none');
    });
    $sheet->cells('N12:N'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','none');
    });
    $sheet->cells('O12:O'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','none');
    });
    $sheet->cells('P12:P'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','none');
    });
    $sheet->cells('Q12:Q'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','none');
    });
    $sheet->cells('R12:R'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','none');
    });
    $sheet->cells('S12:S'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','none');
    });
    $sheet->cells('T12:T'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','none');
    });
    $sheet->cells('U12:U'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','none');
    });
    $sheet->cells('V12:V'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','none');
    });
    $sheet->cells('W12:W'.$a,function($cell){
      $cell->setBorder('thin','thin','thin','none');
    });
    $a++;
    $a++;

    $sheet->cell('K'.$a,'Menyetujui');
    $sheet->cell('S'.$a,'Ungaran');
    $a++;
    $sheet->cell('K'.$a,'Pengguna Anggaran');
    $sheet->cell('S'.$a,'Bendahara Pengeluaran');
    $a++;
    $a++;
    $a++;
    $sheet->cell('K'.$a,'(nama PPTK)');
    $sheet->cell('S'.$a,'(NAMA BENDAHARA)');
    $a++;
    $sheet->cell('K'.$a,'NIP PPTK');
    $sheet->cell('S'.$a,'NIP BENDAHARA');


$pengeluaran = Pengeluaran::where('profile_id',$sekolah)->where('kegiatan_id',$id_keg)
               ->where('jenbel_id',7)->whereRaw('year(tanggal)',$tahun)->whereRaw('month(tanggal)',$bulan)->get();
$sheet->cell('N200',count($pengeluaran));

  /* foreach ($pengeluaran as $p) {
      $sheet->cell('K'.$a,$p->jenbel->nama_jenbel);
      $a++;
    } */


        // Sheet manipulation

    });
  })->download('xlsx');
        }


}
