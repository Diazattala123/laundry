<?php

namespace App\Models;

use App\Models\transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;
    
    public function member()
    {
        return $this->belongsTo(transaksi::class);
    }

}