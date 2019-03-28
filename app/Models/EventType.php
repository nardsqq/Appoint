<?php

namespace Appoint\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Appoint\Models\Event;

class EventType extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public static $rules = [
        'name' => 'required|unique:event_types|min:3|max:255'
    ];
}