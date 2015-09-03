<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id'
    ];

    protected $dates = ['published_at']; // Specifying published_at as a date(a Carbon instant), default it is a string

    /**
     * @param $query
     */
    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Query Scopes
     *
     * display all the unpublished articles - good for an admin panel
     * @param $query
     */
    public function scopeUnPublished($query) {
        $query->where('published_at', '>', Carbon::now());
    }

    /**
     * Mutators
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date) {
//        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date); // set the current date time
//        or
        $this->attributes['published_at'] = Carbon::parse($date); // set to mid night
    }


    /**
     * This is a Accessor, Above one is a mutator
     * @param $date
     * @return Carbon
     */
    public function getPublishedAtAttribute($date) {
//        return new Carbon($date);

//        we could also format the published_at date by default as described below
//        return (new Carbon($date))->format('Y-m-d');

//        same as above using Carbon::parse() with the formatting
        return Carbon::parse($date)->format("Y-m-d"); // then when we access published_at date it'll be always at this format
    }

    /**
     * An article is owned by a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the tags associated with a given article
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){
//        return $this->belongsToMany('App\Tags'); // this failed when we try to assign article ids, need to integrate timestamp too
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**Get a list of tag ids associated with articles
     * @return array
     */
    public function getTagListAttribute(){
        return $this->tags->lists('id');
    }

//    public function tagList(){
//        return $this->tags->lists('id');
//    }
}
