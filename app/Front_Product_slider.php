<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Front_Product_slider extends Model
{
    use Notifiable;
    public $table = "front_product_sliders";
    public $timestamps = false;

    protected $fillable = [
        'tag_heading', 'img', 'user_id', 'date_con', 'is_delete' ];
}
