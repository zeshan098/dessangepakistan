<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Notifiable;
    public $table = "categories";
    public $timestamps = false;

    protected $fillable = [
        'category_name', 'status', 'date' ];
}
