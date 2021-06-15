<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class MainBanner extends Model
{
    use Notifiable;
    public $table = "main_banners";
    public $timestamps = false;

    protected $fillable = [
        'heading', 'button_heading', 'banner_img', 'button_url', 'user_id', 'date_con', 'is_delete' ];
}

