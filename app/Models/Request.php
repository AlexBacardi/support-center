<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'descr',
        'site_id',
        'user_id',
        'satellite_id',
        'priority_id',
        'status_id',
    ];

    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
