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

    //One to Many Relationship
    public function user (){
        return $this->belongsTo('App\User');
    }

    //Many to Many Relationship
    public function tags (){
        return $this->belongsToMany('App\Tag', 'crud_tag', 'crud_id', 'tag_id')->withTimestamps();
    }

    //Accessor to get tag the way we want
    public function getTagListAttributes() {
       return $this->tags->pluck('id');
    }
}
