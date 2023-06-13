<?php

namespace App\Models;

use App\Models\user;
use App\Models\member;
use App\Models\outlet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends modelUmum
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function detail_transaksi()
    {
        return $this->belongsTo(detail_transaksi::class);
    }

    public function member()
    {
        return $this->belongsTo(member::class);
    }

    public function outlet()
    {
        return $this->belongsTo(outlet::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }
    protected static function booted(){
        parent::booted();
    }
}