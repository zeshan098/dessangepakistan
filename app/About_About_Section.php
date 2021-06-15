<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class About_About_Section extends Model
{
    use Notifiable;
    public $table = "about_about_sections";
    public $timestamps = false;

    protected $fillable = [
        'img', 'about_image', 'about_heading', 'about_main_heading', 'description', 'user_id', 'date_con' ];
}
