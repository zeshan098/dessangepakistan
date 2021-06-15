<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class AboutSlider extends Model
{
    use Notifiable;
    public $table = "about_slider";
    public $timestamps = false;

    protected $fillable = [
        'image'];
}
