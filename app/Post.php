<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Notifiable;
    public $table = "posts";
    public $timestamps = false;

    protected $fillable = [
        'title', 'slug', 'image', 'body_text', 'published', 'created_at','updated_at','date','user_id', 'meta_title', 'meta_description', 'meta_keywords'  ];
}
