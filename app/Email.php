<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use Notifiable;
    public $table = "emails";
    public $timestamps = false;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'subject', 'msg','date','status' ];
}
