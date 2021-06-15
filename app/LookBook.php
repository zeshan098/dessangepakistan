<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class LookBook extends Model
{
    use Notifiable;
    public $table = "lookbooks";
    public $timestamps = false;

    protected $fillable = [
        'image', 'status'];
}
