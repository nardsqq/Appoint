<?php

namespace Appoint\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Appoint\User;
use Appoint\Models\Event;

class Booking extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $dates = ['deleted_at'];
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
