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
        return $this->hasMany(Event::class);
    }

    public static function rules($id = '') {
        return [
            'name' => 'required|unique:event_types,name,'.$id.'|min:3|max:255'
        ];
    } 
}