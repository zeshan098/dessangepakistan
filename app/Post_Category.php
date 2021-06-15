<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Post_Category extends Model
{
    use Notifiable;
    public $table = "post_categories";
    public $timestamps = false;

    protected $fillable = [
        'post_id', 'category_id', 'date' ];
}
