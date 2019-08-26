<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = ['kode_kegiatan','nama_kegiatan'];

    public function subkegiatan()
    {
      return  $this->hasMany(Subkegiatan::class);
    }

    public function pengeluaran()
    {
      return $this->hasMany(Pengeluaran::class);
    }
    public function anggaran()
    {
      return $this->hasMany(Anggaran::class);
    }
    public function belanja()
    {
      return $this->hasMany(Belanja::class);
    }
}
