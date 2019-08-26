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

class AdminCetakController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:admin');
    $this->middleware('role:super');
  }


    public function cetakpengeluaranadmin()
    {

      $profile= Profile::all();
      $kegiatan = Kegiatan::all();

      return view('vendor.multiauth.pengeluaran.cetak',compact('kegiatan','profile'));
    }

    public function rekap(Request $request)
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

    $monthNum  = $bulan;
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
    $monthName = $dateObj->format('F');
        $sheet->cell('A1','PEMERINTAH KABUPATEN SEMARANG');
        $sheet->cell('A2','LAPORAN PERTANGGUNGJAWABAN BENDAHARA PENGELUARAN');
        $sheet->cell('A3','(SURAT PERTANGGUNGJAWABAN BELANJA - FUNGSIONAL )');
        $sheet->cell('A4','PERANGKAT DEARAH ');
        $sheet->cell('K4',': DINAS PENDIDIKAN KEBUDAYAAN KEPEMUDAAN DAN OLAHRAGA');
        $sheet->cell('A5','PENGGUNA ANGGARAN ');
        $sheet->cell('K5',':Dra. DEWI PRAMUNINGSIH, M.Pd');
        $sheet->cell('A6','BENDAHARA PENGELUARAN ');
        $sheet->cell('K6',':M. ANDHI KURNIAWAN, SE');
        $sheet->cell('A7','TAHUN ANGGARAN');
        $sheet->cell('K7',": $tahun");
        $sheet->cell('A8','BULAN ');
        $sheet->cell('K8',": $monthName");
        $sheet->cell('A9','NO. PENGESAHAN FUNGSIONAL');
        $sheet->cell('K9',':');
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
        $sheet->cells('A32:W32',function($cell){
          $cell->setFontColor('#f44242');
          $cell->setFontWeight('bold');
        });
        $ba=37;
        $sheet->cell('B36','');
        $sheet->cell('K36','');
        $sheet->cell('K35','');

        $sheet->cell('J37','5.2.2 ');
        $a=39;
        $b=38;
        $c=1;
        $d=1;
        $e=1;
        $h=37;
        $j=$h;

        $start = 38;
        $i = $start;
        $text6 = '';
        $text7 = '';
        $text8 = '';
        $text9 = '';
        $text10 = '';
        $text11 = '';

    /*$pengeluaran = Pengeluaran::select('*')->where('profile_id',$sekolah)->where('kegiatan_id',$id_keg)
                  ->whereRaw('MONTH(tanggal)',$bulan)->whereRaw('year(tanggal)',$tahun)
                  ->orderBy('belanja_id','asc')->orderBy('jenbel_id')->get();*/
    $belanja = Belanja::where('kegiatan_id',$id_keg)->orderBy('kode_belanja')->get();
    $jenbeljml = Jenisbelanja::select('belanjas.kode_belanja','jenisbelanjas.*')
                  ->join('belanjas','belanjas.id','=','jenisbelanjas.belanja_id')
                  ->where('belanjas.kegiatan_id',$id_keg)->get();
    $kegi= Kegiatan::find($id_keg);
    $sklh= Profile::all();
    /*while ($c <= count($belanja)) {
      $jenbel[$c]  = Jenisbelanja::select('belanjas.kode_belanja','jenisbelanjas.*')
                    ->join('belanjas','belanjas.id','=','jenisbelanjas.belanja_id')
                    ->where('belanja_id',$c)->orderBy('kode_belanja')->get();
      $c++;
    }*/
    $sheet->cells('A35:W35',function($cell){
      $cell->setFontColor('#f92b2b');
      $cell->setFontWeight('bold');
    });
    $sheet->cell('K35',$kegi->nama_kegiatan);
    $sheet->cell('A35',$kegi->kode_kegiatan);
    foreach ($sklh as $sek) {
      $text = '';
      $text1[$c] = '';
      $text2[$c] = '';
      $text3[$c] = '';
      $text4[$c] = '';
      $text5[$c] = '';

      $bs= $b-2;
      $bb= $b-1;
      $sheet->cells('A'.$bs.':W'.$bs,function($cell){
        $cell->setFontColor('#0033ff');
        $cell->setFontWeight('bold');
      });
      $sheet->cell('K'.$bs,$sek->nama_sekolah);
      $sheet->cell('J'.$bb,'5.2.2 ');
      $sheet->cells('A'.$bb.':W'.$bb,function($cell){
        $cell->setFontColor('#0c0c0c');
        $cell->setFontWeight('bold');
      });
     $sheet->cell('K'.$bb,'BELANJA BARANG DAN JASA ');
     $text6 .= $j==$h ? 'L'.$j : '+L' . $j;
     $text7 .= $j==$h ? 'M'.$j : '+M' . $j;
     $text8 .= $j==$h ? 'N'.$j : '+N' . $j;
     $text9 .= $j==$h ? 'O'.$j : '+O' . $j;
     $text10 .= $j==$h ? 'V'.$j : '+V' . $j;
     $text11 .= $j==$h ? 'W'.$j : '+W' . $j;
     $j=$j+count($belanja)+(count($belanja)*3)+count($jenbeljml);
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
      $b=$b+4+count($jenbel[$bel->id]);
      $text .= $i==$start ? 'L'.$i : '+L' . $i;
      $text1[$c] .= $i==$start ? 'M'.$i : '+M' . $i;
      $text2[$c] .= $i==$start ? 'N'.$i : '+N' . $i;
      $text3[$c] .= $i==$start ? 'V'.$i : '+V' . $i;
      $text4[$c] .= $i==$start ? 'O'.$i : '+O' . $i;
      $text5[$c] .= $i==$start ? 'W'.$i : '+W' . $i;
      $i=$i+count($jenbel[$bel->id])+3;
      foreach ($jenbel[$bel->id] as $jen) {
        $bln=$bulan-1;
        $dateS = 1;
      $dateE = $bulan-1;
        $pengeluaran = Pengeluaran::where('profile_id',$sek->id)->where('kegiatan_id',$id_keg)
                       ->where('jenbel_id',$jen->id)->whereYear('tanggal','=',$tahun)->whereMonth('tanggal','=',$bulan)->get();
        $pengbln = Pengeluaran::where('profile_id',$sek->id)->where('kegiatan_id',$id_keg)
                       ->where('jenbel_id',$jen->id)->whereYear('tanggal','=',$tahun)->whereMonth('tanggal','=',$bln)->get();
        $pengbln1 = Pengeluaran::where('profile_id',$sekolah)->where('kegiatan_id',$id_keg)
                    ->where('jenbel_id',$jen->id)->whereYear('tanggal','=',$tahun)
                    ->whereRaw("month(tanggal) between $dateS and $dateE  ")->sum('jum_peng');
        $anggaran    = Anggaran::where('profile_id',$sek->id)->where('kegiatan_id',$id_keg)
                        ->where('jenbel_id',$jen->id)->where('tahun',$tahun)->get();
        $sheet->cell('J'.$a,$jen->kode_jenbel);
        $sheet->cell('K'.$a,$jen->nama_jenbel);
        $sheet->cell('O'.$a,'=SUM(M'.$a.':N'.$a.')');
        $sheet->cell('V'.$a,'=SUM(O'.$a.':N'.$a.':U'.$a.')');
        $sheet->cell('W'.$a,'=SUM(L'.$a.'-V'.$a.')');

        foreach ($pengeluaran as $peng) {
          $sheet->cell('N'.$a,$peng->jum_peng);

        }
      //  foreach ($pengbln as $bln) {
        //  $sheet->cell('M'.$a,$bln->jum_peng);

      //  }
        $sheet->cell('M'.$a,$pengbln1);
        foreach ($anggaran as $ang) {
          $sheet->cell('L'.$a,$ang->jumlah_ang);

        }
        $a++;
      }
      $a=$a+4;
      $i++;
    }
    $bt= $b-$ba+3;

    $sheet->cell('L'.$ba,'='.$text.'');
    $sheet->cell('M'.$ba,'='.$text1[$c].'');
    $sheet->cell('N'.$ba,'='.$text2[$c].'');
    $sheet->cell('V'.$ba,'='.$text3[$c].'');
    $sheet->cell('O'.$ba,'='.$text4[$c].'');
    $sheet->cell('W'.$ba,'='.$text5[$c].'');
    $ba=$b-1;
    $c++;
      }
      $sheet->cell('L35','='.$text6.'');
      $sheet->cell('M35','='.$text7.'');
      $sheet->cell('N35','='.$text8.'');
      $sheet->cell('O35','='.$text9.'');
      $sheet->cell('V35','='.$text10.'');
      $sheet->cell('W35','='.$text11.'');

    //$sheet->cell('K38',$jenbel[3]);
        //batas

        $sheet->setColumnFormat(array(
        'A35:W'.$a => '#,##0.00_-'
        ));

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
        $sheet->cell('L'.$a,'=L35');
        $sheet->cell('M'.$a,'=M35');
        $sheet->cell('N'.$a,'=N35');
        $sheet->cell('O'.$a,'=O35');
        $sheet->cell('P'.$a,'=P35');
        $sheet->cell('Q'.$a,'=Q35');
        $sheet->cell('R'.$a,'=R35');
        $sheet->cell('S'.$a,'=S35');
        $sheet->cell('T'.$a,'=T35');
        $sheet->cell('U'.$a,'=U35');
        $sheet->cell('V'.$a,'=V35');
        $sheet->cell('W'.$a,'=W35');
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
        $sheet->cells('A'.$a.':W'.$a,function($cell){
          $cell->setBorder('thin','thin','thin','thin');
        });
        $a++;
        $a++;
        $sheet->cell('K'.$a,'SALDO KAS ');
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

        $sheet->cell('K'.$a,'Kepala Dinas Pendidikan Kebudayaan Kepemudaan dan Olahraga');
        $sheet->cell('S'.$a,'Ungaran');
        $a++;
        $sheet->cell('K'.$a,'Sekretaris Dinas Selaku Pejabat Penatausahaan Keuangan');
        $sheet->cell('S'.$a,'Bendahara Pengeluaran');
        $a++;
        $a++;
        $a++;
        $sheet->cell('K'.$a,'KSUKATON PURTOMO PRIYATNO, SH, MM');
        $sheet->cell('S'.$a,'M. ANDHI KURNIAWAN, SE');
        $a++;
        $sheet->cell('K'.$a,'NIP 19640404 199203 1 014');
        $sheet->cell('S'.$a,'NIP 19840219 201101 1 008');

    $sheet->cell('L'.$a,'TES');
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
