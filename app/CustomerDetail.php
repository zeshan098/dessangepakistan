<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class CustomerDetail extends Model
{
    use Notifiable;
    public $table = "customer_details";
    public $timestamps = false;

    protected $fillable = [
        'name', 'phone_number', 'total_amount', 'branch_id' ];
}
