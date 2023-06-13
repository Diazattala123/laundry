<?php

namespace App\Models;

use App\Models\user;
use App\Models\paket;
use App\Models\transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class outlet extends Model
{
    use SoftDeletes;

    public function paket()
    {
        return $this->belongsTo(paket::class);
    }

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class);
    }
    
    public function user()
    {
        return $this->belongsTo(user::class);
    }
}