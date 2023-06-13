<?php

namespace App\Models;

use App\Models\outlets;
use App\Models\detail_transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function outlet()
    {
        return $this->belongsTo(outlet::class);
    }

    public function detail_transaksi()
    {
        return $this->belongsTo(detail_transaksi::class);
    }
}