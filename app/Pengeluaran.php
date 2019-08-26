<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $fillable = [
      'jum_peng','tanggal'
    ];

    public function profile()
    {
      return $this->belongsTo(Profile::class);
    }
    public function kegiatan()
    {
      return $this->belongsTo(Kegiatan::class);
    }
    public function subkegiatan()
    {
      return $this->belongsTo(Subkegiatan::class);
    }
    public function belanja()
    {
      return $this->belongsTo(Belanja::class);
    }
    public function jenbel()
    {
      return $this->belongsTo(Jenisbelanja::class);
    }
}
