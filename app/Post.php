<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Post
 *
 * @property-read \App\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $slug
 * @property string|null $image
 * @property int|null $category_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 */
class Post extends Model
{
    public function category() { 
        return $this->belongsTo('App\Category'); // Defining that posts belong to category (many to one).
    }

    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps(); // Many to many relationship with Tag.
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
