<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function articles ()
    {
        return $this->belongsToMany('App\Crud', 'crud_tag', 'crud_id', 'tag_id')->withTimestamps();
    }
}
