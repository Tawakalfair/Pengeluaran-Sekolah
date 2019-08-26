<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
      'nama_sekolah','no_telp','alamat','foto'
    ];

    public function sekolah()
    {
      return $this->belongsTo(Sekolah::class);
    }

    public function anggaran()
    {

    return $this->hasMany(Anggaran::class);
    }

    public function pengeluaran()
    {
      return $this->hasMany(Pengeluaran::class);
    }
}
