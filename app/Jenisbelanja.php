<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenisbelanja extends Model
{
    protected $fillable = [
      'kode_jenbel','nama_jenbel'
    ];
    public function belanja()
    {
      return $this->belongsTo(Belanja::class);
    }
    public function pengeluaran()
    {
      return $this->hasMany(Pengeluaran::class);
    }
    public function anggaran()
    {
      return $this->hasMany(Anggaran::class);
    }
}
