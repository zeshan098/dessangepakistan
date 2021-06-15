<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class ServiceDeal extends Model
{
    use Notifiable;
    public $table = "service_deals";
    public $timestamps = false;
    
    protected $fillable = [
        'deal_name', 'description', 'start_date', 'end_date', 'cost', 'status',  'category', 'picture', 'user_id', 'date'  ];
}
