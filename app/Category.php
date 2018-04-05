<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Post[] $posts
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 */
class Category extends Model
{
    protected $table = 'categories'; // Telling laravel to use categories table when working with Category model.

    public function posts() {
        return $this->hasMany('App\Post'); // Defining relationship (one to many). One category has many posts from Post model.
    }
}
