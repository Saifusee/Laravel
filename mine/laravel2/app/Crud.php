<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $fillable = [
        'title',
        'content',
        'published_at',
        'user_id'

    ];

    protected $dates = ['published_at'];

    public function scopePublished($query){
        $query->where('content', 'LIKE', '%Write%');
    }


    public function setContentAttribute($date) {
        $this->attributes['content'] = 'Write whatever you want i am going to display this article content with this mutator go to hell' ;
    }

    public function users (){
        return $this->belongsTo('App\User');
    }
}
