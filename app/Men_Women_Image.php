<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Men_Women_Image extends Model
{
    use Notifiable;
    public $table = "men_women_images";
    public $timestamps = false;

    protected $fillable = [
        'heading', 'img', 'user_id', 'date_con', 'is_delete' ];
}