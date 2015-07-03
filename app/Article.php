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
//        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        $this->attributes['published_at'] = Carbon::parse($date); // set to mid night
    }

    /**
     * An article is owned by a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User');
    }
}
