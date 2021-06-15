<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Front_Page_Menwomen extends Model
{
    use Notifiable;
    public $table = "front_page_menwomens";
    public $timestamps = false;

    protected $fillable = [
        'content', 'user_id', 'date_con', 'is_delete' ];
}