<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    protected $fillable = [
      'jumlah_ang','tahun'
    ];

    public function profile()
    {
      return $this->belongsTo(Profile::class);
    }

    public function jenbel()
    {
      return $this->belongsTo(Jenisbelanja::class);
    }
    public function kegiatan()
    {
      return $this->belongsTo(Kegiatan::class);
    }
}
