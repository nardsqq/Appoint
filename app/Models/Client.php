<?php

namespace Appoint\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Appoint\Models\Project;
class Client extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}