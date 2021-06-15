<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class MainPageContent extends Model
{
    use Notifiable;
    public $table = "main_page_contents";
    public $timestamps = false;

    protected $fillable = [
        'content', 'user_id', 'status', 'meta_title', 'meta_description', 'meta_keywords' ];
}
