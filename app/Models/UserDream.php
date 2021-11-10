<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDream extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "users_dreams";

    protected $fillable = [
        'user_id', 'dream'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
