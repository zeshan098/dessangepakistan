<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class SaveService extends Model
{
    use Notifiable;
    public $table = "save_services";
    public $timestamps = false;

    protected $fillable = [
        'service_id', 'qty', 'date', 'status','purchase_type', 'bill_id', 'datetime' ];
}
