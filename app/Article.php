<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//==========ここから追加==========
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
//==========ここまで追加==========

class Article extends Model
{

     //==========ここから追加==========
    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];
    //==========ここまで追加==========

    //==========ここから追加==========
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
    //==========ここまで追加==========

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

     //===========ここから追加===========
     public function isLikedBy(?User $user): bool
     {
         return $user
             ? (bool)$this->likes->where('id', $user->id)->count()
             : false;
     }
     //===========ここまで追加===========    

     public function getCountLikesAttribute(): int
     {
         return $this->likes->count();
     }
}