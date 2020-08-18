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

    //Scope Declaration
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    //Mutator to set some value before submitting them to Database
    public function setContentAttribute($date)
    {
        $this->attributes['content'] = 'Write whatever you want i am going to display this article content with this mutator go to hell' ;
    }

    //One to Many Relationship
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    //Many to Many Relationship
    public function tags ()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    //Accessor to get tag the way we want
    public function getTagListAttribute()
    {
       return $this->tags->pluck('id');
    }

    //Accessor to get date in the format we want
    public function getPublishedAtAttribute($date)
    {
        return new Carbon($date);
    }
}
