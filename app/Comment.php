<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comment
 *
 * @property-read \App\Post $post
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $comment
 * @property int $approved
 * @property int $post_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUpdatedAt($value)
 */
class Comment extends Model
{
    public function post() {
        return $this->belongsTo('App\Post');
    }
}
