<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Belanja extends Model
{
    protected $fillable = [
      'kode_belanja','nama_belanja'
    ];

    public function pengeluaran()
    {
      return $this->hasMany(Pengeluaran::class);
    }
    public function jenbel()
    {
      return $this->hasMany(Jenisbelanja::class);
    }
    public function kegiatan()
    {
      return $this->BelongsTo(Kegiatan::class);
    }
}
