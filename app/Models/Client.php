<?php

namespace Appoint\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Appoint\Models\Event;
class Client extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public static $rules = [
        'name' => 'required|min:3|max:255',
        'company' => 'required|min:3|max:255',
        'address' => 'required|min:8|max:255',
        'email' => 'sometimes|required|email|unique:clients|min:3|max:255',
        'contact' => 'required|min:7|max:11'
    ];
}
