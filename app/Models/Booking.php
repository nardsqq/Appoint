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
    protected $dates = ['start_date', 'end_date', 'deleted_at'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public static $rules = [
        'description' => 'required|min:3|max:255',
        'start_date' => 'required',
        'end_date' => 'required'
    ];
}
