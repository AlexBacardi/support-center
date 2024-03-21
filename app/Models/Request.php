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
        'type_id',
    ];

    public function priority()
    {

        return $this->belongsTo(Priority::class, 'priority_id', 'id');

    }

    public function satellite()
    {

        return $this->belongsTo(Satellite::class, 'satellite_id', 'id');

    }

    public function status()
    {

        return $this->belongsTo(Status::class, 'status_id', 'id');

    }

    public function type()
    {

        return $this->belongsTo(Type::class, 'type_id', 'id');

    }

    public function user()
    {

        return $this->belongsTo(User::class, 'user_id', 'id');

    }

    public function comments()
    {

        return $this->hasMany(Comment::class, 'request_id', 'id');

    }

    public function files()
    {
        return $this->hasMany(File::class, 'request_id', 'id');
    }
}
