<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class update_history extends Model
{
    use HasFactory;

    protected $fillable = [
        "id", "context", "contextType", "actionType", "user_id", "fullname"
    ];
}