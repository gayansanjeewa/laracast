<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = [
        'name',
    ];

    /**
     * Get the articles associated with the given tag
     *
     * @TODO: check the documentation for the pivot(txn) table standards
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles(){
        return $this->belongsToMany('App\Article');
    }
}
