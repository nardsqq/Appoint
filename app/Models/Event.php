<?php

namespace Appoint\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Appoint\Models \ {
    Client,
    EventType
};

class Event extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'date_time'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public static $rules = [
        'name' => 'required|unique:events|min:3|max:255',
        'event_type_id' => 'required',
        'client_id' => 'required',
        'description' => 'required|min:3|max:255',
        'budget' => 'required|digits_between:0,100000000000',
        'status' => 'required',
        'venue' => 'required|min:3|max:255',
        'date_time' => 'required'
    ];

    public function setDateAttribute($value)
    {
        $this->date = Carbon\Carbon::createFromFormat('d-m-Y h:i', $value);
    }
}
