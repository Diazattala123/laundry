<?php

namespace App\Models;

use App\Models\paket;
use App\Models\pransaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_Transaksi extends Model
{
    use HasFactory;
    public function paket()
    {
        return $this->hasMany(paket::class);
    }

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }
}