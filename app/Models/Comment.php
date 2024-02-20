<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'request_id',
        'message',
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function request()
    {
        $this->belongsTo(Request::class, 'request_id', 'id');
    }
}
