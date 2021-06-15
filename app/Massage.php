<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Massage extends Model
{
    use Notifiable;
    public $table = "messages";
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'name', 'email', 'msg', 'status', 'post_id','datetime','is_user_read','is_admin_read','admin_id' ];
}
